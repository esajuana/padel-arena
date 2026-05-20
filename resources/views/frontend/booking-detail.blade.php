@extends('frontend.layouts.app')

@section('content')

<section
    class="py-5"
    style="margin-top:100px;"
>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div
                    class="card border-0 shadow-lg"
                    style="border-radius:20px;"
                >

                    <div class="card-body p-5">

                        <!-- HEADER -->
                        <div
                            class="d-flex justify-content-between align-items-center mb-4"
                        >

                            <div>

                                <h2 class="fw-bold mb-1">

                                    Detail Booking

                                </h2>

                                <p class="text-muted mb-0">

                                    {{ $booking->invoice_number }}

                                </p>

                            </div>

                            @if($booking->status == 'approved')

                            <span class="badge bg-success px-3 py-2">

                                Paid

                            </span>

                            @elseif($booking->status == 'pending')

                            <span class="badge bg-warning px-3 py-2">

                                Pending

                            </span>

                            @else

                            <span class="badge bg-danger px-3 py-2">

                                Cancelled

                            </span>

                            @endif

                        </div>

                        <hr>

                        <!-- COURT -->
                        <div class="row g-4 mt-3">

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Nama Lapangan

                                </small>

                                <h5>

                                    {{ $booking->court->name }}

                                </h5>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Jenis Lapangan

                                </small>

                                <h5>

                                    {{ $booking->court->type }}

                                </h5>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Tanggal Booking

                                </small>

                                <h5>

                                    {{ $booking->booking_date }}

                                </h5>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Durasi Bermain

                                </small>

                                <h5>

                                    {{ $booking->duration }} Jam

                                </h5>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Jam Bermain

                                </small>

                                <h5>

                                    {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}

                                </h5>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Total Pembayaran

                                </small>

                                <h4 class="text-success fw-bold">

                                    Rp {{ number_format($booking->total_price) }}

                                </h4>

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex gap-3 mt-5">

                            <a
                                href="/my-bookings"
                                class="btn btn-outline-dark w-50 py-3"
                            >

                                Kembali

                            </a>

                            <a
                                href="{{ route('my-bookings.download', $booking->id) }}"
                                class="btn btn-danger w-50 py-3"
                            >

                                Download Invoice

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection