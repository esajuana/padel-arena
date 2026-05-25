@extends('frontend.layouts.app')

@section('content')

<!-- HERO -->
<section
    class="d-flex align-items-center text-white"
    style="
        background:
        linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),
        url('{{ asset('storage/image/image-header.jpg') }}');
        background-size: cover;
        background-position: center;
        min-height: 90vh;
    "
>

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <span class="badge bg-success px-3 py-2 mb-3">
                    #1 Booking Lapangan Padel
                </span>

                <h1 class="display-3 fw-bold mb-4">
                    Booking Lapangan Padel Jadi Lebih Mudah
                </h1>

                <p class="lead mb-4 text-light">

                    Main padel tanpa ribet.
                    Booking lapangan realtime,
                    pilih jadwal favoritmu,
                    dan bayar langsung online.

                </p>

                <div class="d-flex gap-3">

                    <a href="/courts"
                        class="btn btn-success btn-lg px-4">

                        Booking Sekarang
                    </a>

                    <a href="#about"
                        class="btn btn-outline-light btn-lg px-4">

                        Pelajari Lebih
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- KEUNGGULAN -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Kenapa Memilih Kami?
            </h2>

            <p class="text-muted">
                Pengalaman booking lapangan modern dan cepat
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center p-5">

                        <div class="mb-4">

                            <i class="bi bi-calendar-check display-4 text-success"></i>

                        </div>

                        <h4 class="fw-bold">
                            Booking Realtime
                        </h4>

                        <p class="text-muted">

                            Cek slot lapangan secara realtime
                            tanpa takut bentrok jadwal.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center p-5">

                        <div class="mb-4">

                            <i class="bi bi-credit-card display-4 text-success"></i>

                        </div>

                        <h4 class="fw-bold">
                            Pembayaran Mudah
                        </h4>

                        <p class="text-muted">

                            Bayar langsung menggunakan
                            QRIS, transfer bank,
                            dan e-wallet.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center p-5">

                        <div class="mb-4">

                            <i class="bi bi-trophy display-4 text-success"></i>

                        </div>

                        <h4 class="fw-bold">
                            Lapangan Premium
                        </h4>

                        <p class="text-muted">

                            Nikmati pengalaman bermain
                            padel dengan fasilitas terbaik.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- LAPANGAN -->
<section class="py-5">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-5">

            <div>

                <h2 class="fw-bold">
                    Lapangan Tersedia
                </h2>

                <p class="text-muted mb-0">
                    Pilih lapangan favoritmu
                </p>

            </div>

            <a href="/courts"
                class="btn btn-dark">

                Lihat Semua
            </a>

        </div>

        <div class="row g-4">

            @foreach($courts as $court)

            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100 overflow-hidden">

                    @if($court->image)

                    <div class="overflow-hidden">

                        <img
                            src="{{ asset('storage/' . $court->image) }}"
                            class="card-img-top"
                            style="
                                height:260px;
                                object-fit:cover;
                                transition:0.3s;
                            "
                        >

                    </div>

                    @endif

                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between mb-2">

                            <h4 class="fw-bold mb-0">
                                {{ $court->name }}
                            </h4>

                            <span class="badge bg-success">
                                {{ $court->type }}
                            </span>

                        </div>

                        <p class="text-muted">

                            Lapangan padel berkualitas
                            dengan fasilitas premium.

                        </p>

                        <h5 class="fw-bold text-success mb-4">

                            Rp {{ number_format($court->price_per_hour) }}
                            <small class="text-muted">/ jam</small>

                        </h5>

                        <a href="/booking/{{ $court->id }}"
                            class="btn btn-success w-100">

                            Booking Sekarang
                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

<!-- ABOUT -->
<section
    class="py-5 bg-dark text-white"
    id="about"
>

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 mb-4">

                <img
                    src="{{ asset('storage/image/image-header.jpg') }}"
                    class="img-fluid rounded-4 shadow"
                >

            </div>

            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">
                    Tentang Padel Arena
                </h2>

                <p class="text-light">

                    Padel Arena adalah platform booking
                    lapangan padel modern yang memudahkan
                    pemain untuk melakukan reservasi secara online.

                </p>

                <p class="text-light">

                    Dengan sistem realtime booking,
                    pembayaran online,
                    dan manajemen jadwal otomatis,
                    pengalaman bermain menjadi lebih praktis.

                </p>

                <a href="/courts"
                    class="btn btn-success mt-3">

                    Booking Sekarang
                </a>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="py-5 text-center">

    <div class="container">

        <h2 class="fw-bold mb-4">
            Siap Bermain Padel Hari Ini?
        </h2>

        <p class="text-muted mb-4">

            Booking lapangan favoritmu sekarang juga.

        </p>

        <a href="/courts"
            class="btn btn-success btn-lg px-5">

            Mulai Booking
        </a>

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-black text-white py-4">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h5 class="fw-bold">
                    Padel Arena
                </h5>

                <p class="text-secondary mb-0">

                    Sistem booking lapangan padel modern.

                </p>

            </div>

            <div class="col-md-6 text-md-end mt-3 mt-md-0">

                <small class="text-secondary">
                    © {{ date('Y') }} Padel Arena.
                    All rights reserved.
                </small>

            </div>

        </div>

    </div>

</footer>



@endsection