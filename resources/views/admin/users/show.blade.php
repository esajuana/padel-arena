@extends('admin.layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div
            class="card border-0 shadow-sm"
        >

            <div class="card-body p-5">

                <!-- HEADER -->
                <div
                    class="d-flex justify-content-between align-items-center mb-4"
                >

                    <div>

                        <h2 class="fw-bold mb-1">

                            Detail User

                        </h2>

                        <p class="text-muted mb-0">

                            Informasi lengkap user

                        </p>

                    </div>

                    @if($user->role == 'super_admin')

                    <span class="badge bg-danger">

                        Super Admin

                    </span>

                    @elseif($user->role == 'admin')

                    <span class="badge bg-dark">

                        Admin

                    </span>

                    @else

                    <span class="badge bg-success">

                        Customer

                    </span>

                    @endif

                </div>

                <hr>

                <!-- USER INFO -->
                <div class="row g-4 mt-3">

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Nama

                        </small>

                        <h5>

                            {{ $user->name }}

                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Email

                        </small>

                        <h5>

                            {{ $user->email }}

                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Nomor Telepon

                        </small>

                        <h5>

                            {{ $user->phone_number }}

                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Role

                        </small>

                        <h5>

                            {{ ucfirst($user->role) }}

                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Bergabung Sejak

                        </small>

                        <h5>

                            {{ $user->created_at->format('d M Y') }}

                        </h5>

                    </div>

                    <div class="col-md-6">

                        <small class="text-muted d-block">

                            Total Booking

                        </small>

                        <h4 class="text-success fw-bold">

                            {{ $user->bookings->count() }}

                        </h4>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="mt-5 d-flex gap-3">

                    <a
                        href="/admin/users"
                        class="btn btn-outline-dark w-50"
                    >

                        Kembali

                    </a>

                    <a
                        href="/admin/users/{{ $user->id }}/edit"
                        class="btn btn-warning w-50"
                    >

                        Edit User

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection