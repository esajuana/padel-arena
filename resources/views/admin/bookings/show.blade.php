@extends('admin.layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-9">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-5">

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

                    <span class="badge bg-success">

                        Paid

                    </span>

                    @elseif($booking->status == 'pending')

                    <span class="badge bg-warning">

                        Pending

                    </span>

                    @else

                    <span class="badge bg-danger">

                        Cancelled

                    </span>

                    @endif

                </div>

                <hr>

                <div class="row g-4 mt-3">

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Customer

                        </small>

                        <h5>

                            {{ $booking->user->name }}

                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Email

                        </small>

                        <h5>

                            {{ $booking->user->email }}

                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Nomor Telepon

                        </small>

                        <h5>

                            {{ $booking->user->phone_number }}

                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Lapangan

                        </small>

                        <h5>

                            {{ $booking->court->name }}

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

                            Durasi

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

                <div class="d-flex gap-3 mt-5">

                    <a
                        href="/admin/bookings"
                        class="btn btn-outline-dark w-50"
                    >

                        Kembali

                    </a>

                    <a
                        href="/admin/bookings/{{ $booking->id }}/invoice"
                        class="btn btn-success w-50"
                    >

                        Invoice

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection