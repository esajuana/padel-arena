@extends('admin.layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-5">

                <!-- HEADER -->
                <div
                    class="d-flex justify-content-between align-items-center mb-4"
                >

                    <div>

                        <h2 class="fw-bold mb-1">

                            Detail Lapangan

                        </h2>

                        <p class="text-muted mb-0">

                            Informasi lengkap lapangan padel

                        </p>

                    </div>

                    @if($court->status == 1)

                    <span class="badge bg-success">

                        Tersedia

                    </span>

                    @else

                    <span class="badge bg-danger">

                        Tidak Tersedia

                    </span>

                    @endif

                </div>

                <hr>

                <div class="row mt-4 g-5">

                    <!-- IMAGE -->
                    <div class="col-lg-5">

                        @if($court->image)

                        <img
                            src="{{ asset('storage/' . $court->image) }}"
                            class="img-fluid rounded shadow-sm"
                            style="
                                width:100%;
                                height:350px;
                                object-fit:cover;
                            "
                        >

                        @endif

                    </div>

                    <!-- DETAIL -->
                    <div class="col-lg-7">

                        <div class="row g-4">

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Nama Lapangan

                                </small>

                                <h5>

                                    {{ $court->name }}

                                </h5>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Jenis Lapangan

                                </small>

                                <h5>

                                    {{ $court->type }}

                                </h5>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Harga Per Jam

                                </small>

                                <h4 class="text-success fw-bold">

                                    Rp {{ number_format($court->price_per_hour) }}

                                </h4>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted d-block">

                                    Total Booking

                                </small>

                                <h4 class="fw-bold">

                                    {{ $court->bookings->count() }}

                                </h4>

                            </div>

                            <div class="col-12">

                                <small class="text-muted d-block">

                                    Deskripsi

                                </small>

                                <p class="mt-2">

                                    {{ $court->description }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-3 mt-5">

                    <a
                        href="/admin/courts"
                        class="btn btn-outline-dark w-50"
                    >

                        Kembali

                    </a>

                    <a
                        href="/admin/courts/{{ $court->id }}/edit"
                        class="btn btn-warning w-50"
                    >

                        Edit Lapangan

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection