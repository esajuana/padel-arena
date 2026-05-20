@extends('frontend.layouts.app')

@section('content')

<section
    class="py-5"
    style="margin-top:100px;"
>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <!-- TITLE -->
                <div class="mb-4">

                    <h1 class="fw-bold">
                        Edit Lapangan
                    </h1>

                    <p class="text-muted">

                        Update data lapangan padel

                    </p>

                </div>

                <!-- CARD -->
                <div
                    class="card border-0 shadow-lg"
                    style="border-radius:20px;"
                >

                    <div class="card-body p-5">

                        <!-- ERROR -->
                        @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                        @endif

                        <!-- FORM -->
                        <form
                            action="/admin/courts/{{ $court->id }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf
                            @method('PUT')

                            <!-- NAMA -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Nama Lapangan

                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control form-control-lg"
                                    value="{{ $court->name }}"
                                    required
                                >

                            </div>

                            <!-- TYPE -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Jenis Lapangan

                                </label>

                                <input
                                    type="text"
                                    name="type"
                                    class="form-control form-control-lg"
                                    value="{{ $court->type }}"
                                >

                            </div>

                            <!-- HARGA -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Harga Per Jam

                                </label>

                                <input
                                    type="number"
                                    name="price_per_hour"
                                    class="form-control form-control-lg"
                                    value="{{ $court->price_per_hour }}"
                                    required
                                >

                            </div>

                            <!-- STATUS -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Status Lapangan

                                </label>

                                <select
                                    name="status"
                                    class="form-select form-select-lg"
                                >

                                    <option
                                        value="1"
                                        @selected($court->status == '1')
                                    >

                                        Tersedia

                                    </option>

                                    <option
                                        value="0"
                                        @selected($court->status == '0')
                                    >

                                        Tidak Tersedia

                                    </option>

                                </select>

                            </div>

                            <!-- DESKRIPSI -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Deskripsi

                                </label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    class="form-control"
                                >{{ $court->description }}</textarea>

                            </div>

                            <!-- IMAGE -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Gambar Lapangan

                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                >

                            </div>

                            <!-- CURRENT IMAGE -->
                            @if($court->image)

                            <div class="mb-4">

                                <img
                                    src="{{ asset('storage/' . $court->image) }}"
                                    class="img-fluid rounded"
                                    style="
                                        max-height:250px;
                                        object-fit:cover;
                                    "
                                >

                            </div>

                            @endif

                            <!-- BUTTON -->
                            <div class="d-flex gap-3">

                                <a href="/admin/courts"
                                    class="btn btn-outline-dark w-50 py-3">

                                    Kembali

                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-success w-50 py-3"
                                >

                                    Update Lapangan

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection