@extends('admin.layouts.app')

@section('content')

<div
    class="d-flex justify-content-between align-items-center mb-4"
>

    <div>

        <h2 class="fw-bold">
            Kelola User
        </h2>

        <p class="text-muted">

            Data admin dan customer

        </p>

    </div>

    <a href="/admin/users/create"
        class="btn btn-success">

        <i class="bi bi-plus"></i>
        Tambah User

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table align-middle">

            <thead>

                <tr>

                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($users as $user)

                <tr>

                    <td>

                        {{ $user->name }}

                    </td>

                    <td>

                        {{ $user->email }}

                    </td>

                    <td>

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

                    </td>
                    <td class="d-flex gap-2">

                        <!-- EDIT -->
                        <a
                            href="/admin/users/{{ $user->id }}/edit"
                            class="btn btn-warning btn-sm"
                        >

                            Edit

                        </a>

                        <!-- Detail -->
                        <a
                            href="/admin/users/{{ $user->id }}"
                            class="btn btn-info btn-sm text-white"
                        >

                            Detail

                        </a>

                        <!-- DELETE -->
                        @if($user->id != auth()->id())

                        <form
                            action="/admin/users/{{ $user->id }}"
                            method="POST"
                            onsubmit="return confirm(
                                'Yakin ingin menghapus user ini?'
                            )"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                            >

                                Hapus

                            </button>

                        </form>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection