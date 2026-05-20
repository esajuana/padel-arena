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

                <div
                    class="card border-0 shadow-lg"
                    style="border-radius:25px;"
                >

                    <div class="card-body p-5">

                        <!-- TITLE -->
                        <div class="text-center mb-4">

                            <h2 class="fw-bold">
                                Create Account
                            </h2>

                            <p class="text-muted">

                                Daftar untuk mulai booking lapangan padel

                            </p>

                        </div>

                        <!-- FORM -->
                        <form
                            method="POST"
                            action="{{ route('register') }}"
                        >

                            @csrf

                            <!-- NAME -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Full Name

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control form-control-lg"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                >

                                @error('name')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                                @enderror

                            </div>

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
                                >

                                @error('email')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                                @enderror

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Nomor Telepon

                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    required
                                >

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

                            <!-- CONFIRM PASSWORD -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Confirm Password

                                </label>

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control form-control-lg"
                                    required
                                >

                            </div>

                            <!-- BUTTON -->
                            <button
                                type="submit"
                                class="btn btn-success btn-lg w-100 py-3"
                            >

                                Register Account

                            </button>

                        </form>

                        <!-- LOGIN -->
                        <div class="text-center mt-4">

                            <p class="mb-0">

                                Sudah punya akun?

                                <a
                                    href="{{ route('login') }}"
                                    class="text-success fw-semibold text-decoration-none"
                                >

                                    Login

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