@extends('frontend.layouts.app')

@section('content')

<section class="py-5">

    <div class="container">

        <h2 class="mt-5 mb-5 text-center">
            Semua Lapangan
        </h2>

        <div class="row">

            @foreach($courts as $court)

            <div class="col-md-4 mb-4">

                <div class="card shadow border-0 h-100">

                    @if($court->image)

                    <img src="{{ asset('storage/' . $court->image) }}"
                        class="card-img-top"
                        style="height:250px; object-fit:cover;">

                    @endif

                    <div class="card-body">

                        <h4>
                            {{ $court->name }}
                        </h4>

                        <p>
                            {{ $court->type }}
                        </p>

                        <h5 class="mb-3">
                            Rp {{ number_format($court->price_per_hour) }}/jam
                        </h5>

                        <a href="/booking/{{ $court->id }}"
                            class="btn btn-dark w-100">

                            Booking
                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-black text-white py-4">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h5 class="fw-bold">
                    Padel Arena
                </h5>

                <p class="text-secondary mb-0">

                    Sistem booking lapangan padel modern.

                </p>

            </div>

            <div class="col-md-6 text-md-end mt-3 mt-md-0">

                <small class="text-secondary">
                    © {{ date('Y') }} Padel Arena.
                    All rights reserved.
                </small>

            </div>

        </div>

    </div>

</footer>

@endsection