<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Court;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->get();
        
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create(Court $court)
    {
        return view('frontend.booking', compact('court'));
    }

    public function show(Booking $booking)
    {
        // CEGAH USER MELIHAT BOOKING ORANG LAIN
        if ($booking->user_id != auth()->id()) {

            abort(403);

        }

        $booking->load('court', 'user');

        return view(
            'frontend.booking-detail',
            compact('booking')
        );
    }

    public function store(Request $request, Court $court)
    {
        $request->validate([
            'booking_date' => 'required',
            'start_time' => 'required',
            'duration' => 'required'
        ]);

        $start = Carbon::parse($request->start_time);

        $end = $start->copy()
            ->addHours((int) $request->duration);

        // VALIDASI SLOT
        $conflict = Booking::where('court_id', $court->id)
            ->where('booking_date', $request->booking_date)
            ->where(function ($query) use ($start, $end) {

                $query->where('start_time', '<', $end)
                    ->where('end_time', '>', $start);

            })
            ->exists();

        if ($conflict) {

            return back()
                ->with('error', 'Jadwal sudah dibooking');

        }

        $total = $court->price_per_hour
            * (int) $request->duration;

        // SIMPAN SESSION SEMENTARA
        session([
            'booking_data' => [

                'court_id' => $court->id,
                'booking_date' => $request->booking_date,
                'start_time' => $start->format('H:i:s'),
                'end_time' => $end->format('H:i:s'),
                'duration' => $request->duration,
                'total_price' => $total,

            ]
        ]);

        // MIDTRANS CONFIG
        Config::$serverKey = config('midtrans.server_key');

        Config::$isProduction = false;

        Config::$isSanitized = true;

        Config::$is3ds = true;

        $params = [

            'transaction_details' => [

                'order_id' => 'BOOK-' . time(),

                'gross_amount' => $total,

            ],

            'customer_details' => [

                'first_name' => auth()->user()->name,

                'email' => auth()->user()->email,

            ],

        ];

        $snapToken = Snap::getSnapToken($params);

        return view('frontend.checkout', compact(
            'snapToken',
            'court',
            'total'
        ));
    }

    public function slots(Request $request, Court $court)
    {
        $bookings = Booking::where('court_id', $court->id)
            ->where('booking_date', $request->date)
            ->get();

        $slots = [];

        for ($hour = 8; $hour <= 22; $hour++) {

            $time = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';

            $booked = false;

            foreach ($bookings as $booking) {

                if (
                    $time >= substr($booking->start_time, 0, 5)
                    &&
                    $time < substr($booking->end_time, 0, 5)
                ) {

                    $booked = true;

                }

            }

            $slots[] = [
                'time' => $time,
                'booked' => $booked
            ];
        }

        return response()->json($slots);
    }

    public function updateStatus(Booking $booking, $status)
    {
        $booking->update([
            'status' => $status
        ]);

        return back()->with('success', 'Status booking berhasil diupdate');
    }

    public function history()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('frontend.history', compact('bookings'));
    }

    public function calendar()
    {
        return view('admin.calendar');
    }

    public function events()
    {
        $bookings = Booking::with(['user', 'court'])
            ->get();

        $events = [];

        foreach ($bookings as $booking) {

            $color = '#ffc107';

            if ($booking->status == 'approved') {

                $color = '#198754';

            } elseif ($booking->status == 'cancelled') {

                $color = '#dc3545';

            }

            $events[] = [

                'title' =>
                    $booking->court->name .
                    ' - ' .
                    $booking->user->name,

                'start' =>
                    $booking->booking_date .
                    'T' .
                    $booking->start_time,

                'end' =>
                    $booking->booking_date .
                    'T' .
                    $booking->end_time,

                'backgroundColor' => $color,
                'borderColor' => $color,

            ];
        }

        return response()->json($events);
    }

    public function paymentSuccess()
    {
        $data = session('booking_data');

        if (!$data) {

            return redirect('/');

        }

            $booking = Booking::create([

            'user_id' => auth()->id(),

            'court_id' => $data['court_id'],

            'booking_date' => $data['booking_date'],

            'start_time' => $data['start_time'],

            'end_time' => $data['end_time'],

            'duration' => $data['duration'],

            'total_price' => $data['total_price'],

            'status' => 'approved'

        ]);

        // GENERATE INVOICE NUMBER
        $booking->invoice_number =
            'INV-' .
            date('Y') .
            '-' .
            str_pad(
                $booking->id,
                5,
                '0',
                STR_PAD_LEFT
            );

        $booking->save();

        session()->forget('booking_data');

        return redirect('/my-bookings')
            ->with('success', 'Booking berhasil dibayar');
    }

    public function myBookings()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('frontend.my-bookings', compact(
            'bookings'
        ));
    }

    public function downloadInvoice(Booking $booking)
    {
        // CEGAH USER AKSES BOOKING ORANG LAIN
        if ($booking->user_id != auth()->id()) {

            abort(403);

        }

        $booking->load('court');

        $pdf = Pdf::loadView(
            'frontend.invoice-pdf',
            compact('booking')
        );

        return $pdf->download(
            'invoice-booking-'.$booking->id.'.pdf'
        );
    }

    public function adminShow(Booking $booking)
    {
        $booking->load('user', 'court');

        return view('admin.bookings.show', compact('booking'));
    }

    public function adminInvoice(Booking $booking)
    {
        $booking->load('user', 'court');

        return view('admin.bookings.invoice', compact('booking'));
    }

    public function adminDownloadInvoice(Booking $booking)
    {
        $booking->load('user', 'court');

        $pdf = Pdf::loadView('admin.bookings.invoice-pdf', compact('booking'));

        return $pdf->download(
            $booking->invoice_number . '.pdf'
        );
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return back()->with(
            'success',
            'Booking berhasil dihapus'
        );
    }
        
}