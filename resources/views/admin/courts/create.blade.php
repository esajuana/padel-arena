@extends('admin.layouts.app')

@section('content')

<h2 class="mb-4">
    Tambah Lapangan
</h2>

<div class="card shadow border-0">

    <div class="card-body">

        <form action="/admin/courts"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label>Nama Lapangan</label>

                <input type="text"
                    name="name"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Tipe</label>

                <input type="text"
                    name="type"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Harga per Jam</label>

                <input type="number"
                    name="price_per_hour"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Gambar</label>

                <input type="file"
                    name="image"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Deskripsi</label>

                <textarea name="description"
                    class="form-control"></textarea>

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select name="status"
                    class="form-control">

                    <option value="1">
                        Tersedia
                    </option>

                    <option value="0">
                        Tidak Tersedia
                    </option>

                </select>

            </div>

            <button class="btn btn-dark">
                Simpan
            </button>

        </form>

    </div>

</div>

@endsection