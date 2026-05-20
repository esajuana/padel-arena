@extends('frontend.layouts.app')

@section('content')

<section
    class="d-flex align-items-center"
    style="
        min-height:100vh;
        background:
        linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),
        url('{{ asset('storage/image/img-header.jpg') }}');
        background-size: cover;
        background-position: center;
    "
>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card border-0 shadow-lg"
                style="border-radius:25px;">

                <div class="card-body p-5 text-center">

                    <h2 class="fw-bold mb-4">
                        Verify Email
                    </h2>

                    <p class="text-muted mb-4">

                        Terima kasih telah mendaftar.
                        Silakan verifikasi email Anda.

                    </p>

                    @if (session('status') == 'verification-link-sent')

                    <div class="alert alert-success">

                        Link verifikasi baru telah dikirim.

                    </div>

                    @endif

                    <form method="POST"
                        action="{{ route('verification.send') }}">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-success btn-lg w-100 mb-3"
                        >

                            Kirim Ulang Verifikasi

                        </button>

                    </form>

                    <form method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-outline-dark w-100"
                        >

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

@endsection