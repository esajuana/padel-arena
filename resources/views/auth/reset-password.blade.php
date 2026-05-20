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
                            Reset Password
                        </h2>

                    </div>

                    <form method="POST"
                        action="{{ route('password.store') }}">

                        @csrf

                        <input
                            type="hidden"
                            name="token"
                            value="{{ $request->route('token') }}"
                        >

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Email Address

                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg"
                                value="{{ old('email', $request->email) }}"
                                required
                            >

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                New Password

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-lg"
                                required
                            >

                        </div>

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

                        <button
                            type="submit"
                            class="btn btn-success btn-lg w-100"
                        >

                            Reset Password

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

@endsection