@extends('admin.layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4">

                <h3 class="fw-bold mb-4">

                    Tambah User

                </h3>

                <form
                    action="/admin/users"
                    method="POST"
                >

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
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
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="mb-4">

                        <label class="form-label">

                            Role

                        </label>

                        <select
                            name="role"
                            class="form-select"
                        >

                            <option value="admin">

                                Admin

                            </option>

                            <option value="customer">

                                Customer

                            </option>

                        </select>

                    </div>

                    <button
                        class="btn btn-success w-100"
                    >

                        Simpan User

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection