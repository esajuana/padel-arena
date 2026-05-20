@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Data Lapangan</h2>

    <a href="/admin/courts/create"
        class="btn btn-dark">

        Tambah Lapangan
    </a>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow border-0">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga/Jam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @foreach($courts as $court)

                <tr>

                    <td width="120">

                        @if($court->image)

                        <img src="{{ asset('storage/' . $court->image) }}"
                            class="img-fluid rounded">

                        @endif

                    </td>

                    <td>{{ $court->name }}</td>

                    <td>
                        Rp {{ number_format($court->price_per_hour) }}
                    </td>

                    <td>

                        @if($court->status)

                        <span class="badge bg-success">
                            Tersedia
                        </span>

                        @else

                        <span class="badge bg-danger">
                            Tidak Tersedia
                        </span>

                        @endif

                    </td>

                    <td>

                        <a href="/admin/courts/{{ $court->id }}/edit"
                            class="btn btn-warning btn-sm">

                            Edit
                        </a>

                        <a
                            href="/admin/courts/{{ $court->id }}"
                            class="btn btn-info btn-sm text-white"
                        >

                            Detail

                        </a>

                        <form action="/admin/courts/{{ $court->id }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection