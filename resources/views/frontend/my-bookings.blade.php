@extends('frontend.layouts.app')

@section('content')

<section
    class="py-5"
    style="margin-top:100px;"
>

    <div class="container">

        <!-- TITLE -->
        <div class="mb-5">

            <h1 class="fw-bold">
                My Bookings
            </h1>

            <p class="text-muted">

                Riwayat booking lapangan padel Anda

            </p>

        </div>

        @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

        @endif

        <!-- EMPTY -->
        @if($bookings->count() == 0)

        <div class="card border-0 shadow-sm">

            <div class="card-body text-center p-5">

                <i
                    class="bi bi-calendar-x display-1 text-muted"
                ></i>

                <h3 class="mt-4">
                    Belum Ada Booking
                </h3>

                <p class="text-muted">

                    Anda belum melakukan booking lapangan.

                </p>

                <a href="/courts"
                    class="btn btn-success mt-3">

                    Booking Sekarang

                </a>

            </div>

        </div>

        @endif

        <!-- BOOKING LIST -->
        <div class="row g-4">

            @foreach($bookings as $booking)

            <div class="col-lg-6">

                <div
                    class="card border-0 shadow-lg h-100"
                    style="border-radius:20px;"
                >

                    <div class="card-body p-4">

                        <!-- HEADER -->
                        <div
                            class="d-flex justify-content-between align-items-start mb-4"
                        >

                            <div>

                                <h3 class="fw-bold mb-1">

                                    {{ $booking->court->name }}

                                </h3>

                                <p class="text-muted mb-0">

                                    {{ $booking->court->type }}

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

                        <!-- DETAIL -->
                        <div class="row mb-4">

                            <div class="col-6 mb-3">

                                <small class="text-muted d-block">

                                    Tanggal

                                </small>

                                <strong>

                                    {{ $booking->booking_date }}

                                </strong>

                            </div>

                            <div class="col-6 mb-3">

                                <small class="text-muted d-block">

                                    Durasi

                                </small>

                                <strong>

                                    {{ $booking->duration }} Jam

                                </strong>

                            </div>

                            <div class="col-6">

                                <small class="text-muted d-block">

                                    Jam Main

                                </small>

                                <strong>

                                    {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}

                                </strong>

                            </div>

                            <div class="col-6">

                                <small class="text-muted d-block">

                                    Total Bayar

                                </small>

                                <strong class="text-success">

                                    Rp {{ number_format($booking->total_price) }}

                                </strong>

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex gap-2">

                            <a
                                href="{{ route('my-bookings.show', $booking->id) }}"
                                class="btn btn-outline-dark w-100"
                            >

                                Detail

                            </a>

                            @if($booking->status == 'approved')

                                <a
                                href="{{ route('my-bookings.download', $booking->id) }}"
                                class="btn btn-danger"
                                >

                                Download PDF

                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection