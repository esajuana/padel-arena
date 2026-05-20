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

        <div class="col-lg-5">

            <div class="card border-0 shadow-lg"
                style="border-radius:25px;">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <h2 class="fw-bold">
                            Forgot Password
                        </h2>

                        <p class="text-muted">

                            Masukkan email untuk reset password

                        </p>

                    </div>

                    @if (session('status'))

                    <div class="alert alert-success">

                        {{ session('status') }}

                    </div>

                    @endif

                    <form method="POST"
                        action="{{ route('password.email') }}">

                        @csrf

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Email Address

                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg"
                                required
                            >

                            @error('email')

                            <small class="text-danger">

                                {{ $message }}

                            </small>

                            @enderror

                        </div>

                        <button
                            type="submit"
                            class="btn btn-success btn-lg w-100"
                        >

                            Send Reset Link

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

@endsection