@extends('frontend.layouts.app')

@section('content')

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow border-0">

                    <div class="card-body p-5 text-center">

                        <h2 class="mb-4">
                            Checkout Booking
                        </h2>

                        <h4>
                            {{ $court->name }}
                        </h4>

                        <h3 class="my-4">

                            Rp {{ number_format($total) }}

                        </h3>

                        <button id="pay-button"
                            class="btn btn-dark btn-lg w-100">

                            Bayar Sekarang

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<script
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script>

document.getElementById('pay-button')
.addEventListener('click', function () {

    snap.pay('{{ $snapToken }}', {

        onSuccess: function(result) {

            window.location.href = '/payment-success';

        },

        onPending: function(result) {

            alert('Menunggu pembayaran');

        },

        onError: function(result) {

            alert('Pembayaran gagal');

        }

    });

});

</script>

@endsection