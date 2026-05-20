@extends('admin.layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <h3 class="fw-bold mb-4">

                    Edit User

                </h3>

                <form
                    action="/admin/users/{{ $user->id }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')

                    <!-- NAMA -->
                    <div class="mb-3">

                        <label class="form-label">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ $user->name }}"
                            required
                        >

                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">

                        <label class="form-label">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ $user->email }}"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Nomor Telepon

                        </label>

                        <input
                            type="text"
                            name="phone_number"
                            class="form-control"
                            value="{{ $user->phone_number }}"
                        >

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">

                        <label class="form-label">

                            Password Baru

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                        >

                        <small class="text-muted">

                            Kosongkan jika tidak ingin mengganti password

                        </small>

                    </div>

                    <!-- ROLE -->
                    <div class="mb-4">

                        <label class="form-label">

                            Role

                        </label>

                        <select
                            name="role"
                            class="form-select"
                        >

                            <option
                                value="admin"
                                @selected($user->role == 'admin')
                            >

                                Admin

                            </option>

                            <option
                                value="customer"
                                @selected($user->role == 'customer')
                            >

                                Customer

                            </option>

                            <option
                                value="super_admin"
                                @selected($user->role == 'super_admin')
                            >

                                Super Admin

                            </option>

                        </select>

                    </div>

                    <!-- BUTTON -->
                    <button
                        class="btn btn-success w-100"
                    >

                        Update User

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection