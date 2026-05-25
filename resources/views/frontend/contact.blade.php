@extends('frontend.layouts.app')

@section('content')

<section
    class="py-5"
    style="margin-top:100px;"
>

    <div class="container">

        <!-- TITLE -->
        <div class="text-center mb-5">

            <h1 class="fw-bold">
                Kontak Kami
            </h1>

            <p class="text-muted">

                Hubungi kami untuk booking lapangan padel

            </p>

        </div>

        <div class="row g-5">

            <!-- INFO -->
            <div class="col-lg-5">

                <div
                    class="card border-0 shadow-lg h-100"
                    style="border-radius:20px;"
                >

                    <div class="card-body p-5">

                        <h3 class="fw-bold mb-4">

                            Informasi Kontak

                        </h3>

                        <!-- WHATSAPP -->
                        <div class="mb-4">

                            <div class="d-flex align-items-center">

                                <div
                                    class="bg-success text-white rounded-circle d-flex justify-content-center align-items-center"
                                    style="
                                        width:50px;
                                        height:50px;
                                    "
                                >

                                    <i class="bi bi-whatsapp"></i>

                                </div>

                                <div class="ms-3">

                                    <small class="text-muted">

                                        WhatsApp

                                    </small>

                                    <h6 class="mb-0">

                                        0812-3456-7890

                                    </h6>

                                </div>

                            </div>

                        </div>

                        <!-- PHONE -->
                        <div class="mb-4">

                            <div class="d-flex align-items-center">

                                <div
                                    class="bg-dark text-white rounded-circle d-flex justify-content-center align-items-center"
                                    style="
                                        width:50px;
                                        height:50px;
                                    "
                                >

                                    <i class="bi bi-telephone"></i>

                                </div>

                                <div class="ms-3">

                                    <small class="text-muted">

                                        Telepon

                                    </small>

                                    <h6 class="mb-0">

                                        (0361) 123456

                                    </h6>

                                </div>

                            </div>

                        </div>

                        <!-- EMAIL -->
                        <div class="mb-4">

                            <div class="d-flex align-items-center">

                                <div
                                    class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                    style="
                                        width:50px;
                                        height:50px;
                                    "
                                >

                                    <i class="bi bi-envelope"></i>

                                </div>

                                <div class="ms-3">

                                    <small class="text-muted">

                                        Email

                                    </small>

                                    <h6 class="mb-0">

                                        info@padelarena.com

                                    </h6>

                                </div>

                            </div>

                        </div>

                        <!-- INSTAGRAM -->
                        <div class="mb-4">

                            <div class="d-flex align-items-center">

                                <div
                                    class="bg-danger text-white rounded-circle d-flex justify-content-center align-items-center"
                                    style="
                                        width:50px;
                                        height:50px;
                                    "
                                >

                                    <i class="bi bi-instagram"></i>

                                </div>

                                <div class="ms-3">

                                    <small class="text-muted">

                                        Instagram

                                    </small>

                                    <h6 class="mb-0">

                                        @padelarena

                                    </h6>

                                </div>

                            </div>

                        </div>

                        <!-- TIKTOK -->
                        <div class="mb-4">

                            <div class="d-flex align-items-center">

                                <div
                                    class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center"
                                    style="
                                        width:50px;
                                        height:50px;
                                    "
                                >

                                    <i class="bi bi-tiktok"></i>

                                </div>

                                <div class="ms-3">

                                    <small class="text-muted">

                                        TikTok

                                    </small>

                                    <h6 class="mb-0">

                                        @padelarena

                                    </h6>

                                </div>

                            </div>

                        </div>

                        <!-- ADDRESS -->
                        <div>

                            <h5 class="fw-bold mt-5">

                                Alamat

                            </h5>

                            <p class="text-muted mb-0">

                                Jl. Padel No. 10,
                                Denpasar, Bali

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- MAP -->
            <div class="col-lg-7">

                <div
                    class="card border-0 shadow-lg overflow-hidden"
                    style="border-radius:20px;"
                >

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18..."
                        width="100%"
                        height="600"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                    ></iframe>

                </div>

            </div>

        </div>

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