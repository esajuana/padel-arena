@extends('frontend.layouts.app')

@section('content')

<section class="py-5">

    <div class="container">

        <h2 class="mb-4">
            Riwayat Booking
        </h2>

        <div class="card shadow border-0">

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Total</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($bookings as $booking)

                        <tr>

                            <td>
                                {{ $booking->court->name }}
                            </td>

                            <td>
                                {{ $booking->booking_date }}
                            </td>

                            <td>

                                {{ substr($booking->start_time,0,5) }}
                                -
                                {{ substr($booking->end_time,0,5) }}

                            </td>

                            <td>
                                Rp {{ number_format($booking->total_price) }}
                            </td>

                            <td>

                                @if($booking->status == 'pending')

                                <span class="badge bg-warning">
                                    Pending
                                </span>

                                @elseif($booking->status == 'approved')

                                <span class="badge bg-success">
                                    Approved
                                </span>

                                @else

                                <span class="badge bg-danger">
                                    Cancelled
                                </span>

                                @endif

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection