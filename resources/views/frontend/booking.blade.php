@extends('frontend.layouts.app')

@section('content')

<section
    class="py-5"
    style="margin-top:100px;"
>

    <div class="container">

        <div class="row g-5">

            <!-- DETAIL LAPANGAN -->
            <div class="col-lg-5">

                <div class="card border-0 shadow-lg overflow-hidden">

                    @if($court->image)

                    <img
                        src="{{ asset('storage/' . $court->image) }}"
                        class="img-fluid"
                        style="
                            height:350px;
                            object-fit:cover;
                        "
                    >

                    @endif

                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h2 class="fw-bold mb-0">
                                {{ $court->name }}
                            </h2>

                            <span class="badge bg-success px-3 py-2">
                                {{ $court->type }}
                            </span>

                        </div>

                        <p class="text-muted">

                            Lapangan padel premium dengan
                            fasilitas modern dan nyaman
                            untuk bermain bersama teman.

                        </p>

                        <div class="mb-3">

                            <h3 class="text-success fw-bold">

                                Rp {{ number_format($court->price_per_hour) }}

                                <small class="text-muted fs-6">
                                    / jam
                                </small>

                            </h3>

                        </div>

                        <div class="d-flex gap-3">

                            <div class="text-center">

                                <i class="bi bi-lightning-charge-fill text-success fs-3"></i>

                                <p class="small mb-0">
                                    Fast Booking
                                </p>

                            </div>

                            <div class="text-center">

                                <i class="bi bi-calendar-check text-success fs-3"></i>

                                <p class="small mb-0">
                                    Realtime Slot
                                </p>

                            </div>

                            <div class="text-center">

                                <i class="bi bi-credit-card text-success fs-3"></i>

                                <p class="small mb-0">
                                    Online Payment
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- FORM BOOKING -->
            <div class="col-lg-7">

                <div class="card border-0 shadow-lg">

                    <div class="card-body p-5">

                        <h2 class="fw-bold mb-4">
                            Booking Lapangan
                        </h2>

                        @if(session('error'))

                        <div class="alert alert-danger">

                            {{ session('error') }}

                        </div>

                        @endif

                        <form
                            action="/booking/{{ $court->id }}"
                            method="POST"
                        >

                            @csrf

                            <!-- TANGGAL -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Pilih Tanggal

                                </label>

                                <input
                                    type="date"
                                    id="booking_date"
                                    name="booking_date"
                                    class="form-control form-control-lg"
                                    required
                                >

                            </div>

                            <!-- SLOT -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Pilih Jam Bermain

                                </label>

                                <div
                                    id="slots"
                                    class="d-flex flex-wrap gap-2"
                                >

                                </div>

                                <small class="text-muted d-block mt-2">

                                    Hijau = tersedia,
                                    Merah = sudah dibooking

                                </small>

                            </div>

                            <input
                                type="hidden"
                                name="start_time"
                                id="start_time"
                            >

                            <!-- DURASI -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Durasi Bermain

                                </label>

                                <select
                                    name="duration"
                                    id="duration"
                                    class="form-select form-select-lg"
                                >

                                    <option value="1">
                                        1 Jam
                                    </option>

                                    <option value="2">
                                        2 Jam
                                    </option>

                                    <option value="3">
                                        3 Jam
                                    </option>

                                    <option value="4">
                                        4 Jam
                                    </option>

                                </select>

                            </div>

                            <!-- TOTAL -->
                            <div
                                class="bg-light rounded-4 p-4 mb-4"
                            >

                                <div class="d-flex justify-content-between">

                                    <span class="fw-semibold">

                                        Total Pembayaran

                                    </span>

                                    <h4
                                        class="text-success fw-bold mb-0"
                                        id="total-price"
                                    >

                                        Rp {{ number_format($court->price_per_hour) }}

                                    </h4>

                                </div>

                            </div>

                            <!-- BUTTON -->
                            <button
                                class="btn btn-success btn-lg w-100 py-3"
                            >

                                <i class="bi bi-credit-card me-2"></i>

                                Lanjut Pembayaran

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<script>

const pricePerHour = {{ $court->price_per_hour }};

const durationSelect =
    document.getElementById('duration');

const totalPrice =
    document.getElementById('total-price');

function updatePrice() {

    let duration = durationSelect.value;

    let total = pricePerHour * duration;

    totalPrice.innerHTML =
        'Rp ' + total.toLocaleString('id-ID');

}

durationSelect.addEventListener(
    'change',
    updatePrice
);

updatePrice();

document.getElementById('booking_date')
.addEventListener('change', function () {

    let date = this.value;

    fetch(`/booking/{{ $court->id }}/slots?date=${date}`)

    .then(response => response.json())

    .then(data => {

        let html = '';

        data.forEach(slot => {

            if (slot.booked) {

                html += `
                    <button
                        type="button"
                        class="btn btn-danger rounded-pill px-4"
                        disabled
                    >
                        ${slot.time}
                    </button>
                `;

            } else {

                html += `
                    <button
                        type="button"
                        class="btn btn-outline-success rounded-pill px-4 slot-btn"
                        data-time="${slot.time}"
                    >
                        ${slot.time}
                    </button>
                `;
            }

        });

        document.getElementById('slots')
            .innerHTML = html;

        document.querySelectorAll('.slot-btn')
        .forEach(button => {

            button.addEventListener('click', function () {

                document.getElementById('start_time')
                    .value = this.dataset.time;

                document.querySelectorAll('.slot-btn')
                .forEach(btn => {

                    btn.classList.remove('btn-success');

                    btn.classList.add('btn-outline-success');

                });

                this.classList.remove('btn-outline-success');

                this.classList.add('btn-success');

            });

        });

    });

});

</script>

@endsection