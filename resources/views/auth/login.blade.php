@extends('frontend.layouts.app')

@section('content')

<section
    class="d-flex align-items-center"
    style="
        min-height:100vh;
        background:
        linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
        url('{{ asset('storage/image/img-header.jpg') }}');
        background-size: cover;
        background-position: center;
    "
>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div
                    class="card border-0 shadow-lg"
                    style="border-radius:25px;"
                >

                    <div class="card-body p-5">

                        <!-- TITLE -->
                        <div class="text-center mb-4">

                            <h2 class="fw-bold">
                                Welcome Back
                            </h2>

                            <p class="text-muted">

                                Login untuk booking lapangan padel

                            </p>

                        </div>

                        <!-- SESSION STATUS -->
                        @if (session('status'))

                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>

                        @endif

                        <!-- FORM -->
                        <form
                            method="POST"
                            action="{{ route('login') }}"
                        >

                            @csrf

                            <!-- EMAIL -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Email Address

                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control form-control-lg"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                >

                                @error('email')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                                @enderror

                            </div>

                            <!-- PASSWORD -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Password

                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control form-control-lg"
                                    required
                                >

                                @error('password')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                                @enderror

                            </div>

                            <!-- REMEMBER -->
                            <div
                                class="d-flex justify-content-between align-items-center mb-4"
                            >

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="remember"
                                        id="remember"
                                    >

                                    <label
                                        class="form-check-label"
                                        for="remember"
                                    >

                                        Remember me

                                    </label>

                                </div>

                                @if (Route::has('password.request'))

                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-decoration-none text-success"
                                >

                                    Forgot Password?

                                </a>

                                @endif

                            </div>

                            <!-- BUTTON -->
                            <button
                                type="submit"
                                class="btn btn-success btn-lg w-100 py-3"
                            >

                                Login

                            </button>

                        </form>

                        <!-- REGISTER -->
                        <div class="text-center mt-4">

                            <p class="mb-0">

                                Belum punya akun?

                                <a
                                    href="{{ route('register') }}"
                                    class="text-success fw-semibold text-decoration-none"
                                >

                                    Register

                                </a>

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection