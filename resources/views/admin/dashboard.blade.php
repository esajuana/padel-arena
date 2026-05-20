@extends('admin.layouts.app')

@section('content')

<h2 class="mb-4">
    Dashboard Admin
</h2>

<!-- STATISTIK -->
<div class="row">

    <div class="col-md-3 mb-4">

        <div class="card shadow border-0 bg-dark text-white">

            <div class="card-body">

                <h6>Total Booking</h6>

                <h2>
                    {{ $totalBookings }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow border-0 bg-success text-white">

            <div class="card-body">

                <h6>Total Lapangan</h6>

                <h2>
                    {{ $totalCourts }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow border-0 bg-primary text-white">

            <div class="card-body">

                <h6>Total User</h6>

                <h2>
                    {{ $totalUsers }}
                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card shadow border-0 bg-warning text-dark">

            <div class="card-body">

                <h6>Total Pendapatan</h6>

                <h4>
                    Rp {{ number_format($totalRevenue) }}
                </h4>

            </div>

        </div>

    </div>

</div>

{{-- <!-- CHART -->
<div class="card shadow border-0 mb-4">

    <div class="card-body">

        <h5 class="mb-4">
            Statistik Booking
        </h5>

        <canvas id="bookingChart"></canvas>

    </div>

</div> --}}

<!-- RECENT BOOKING -->
<div class="card shadow border-0">

    <div class="card-body">

        <h5 class="mb-4">
            Booking Terbaru
        </h5>

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>User</th>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @foreach($recentBookings as $booking)

                <tr>

                    <td>
                        {{ $booking->user->name }}
                    </td>

                    <td>
                        {{ $booking->court->name }}
                    </td>

                    <td>
                        {{ $booking->booking_date }}
                    </td>

                    <td>
                        Rp {{ number_format($booking->total_price) }}
                    </td>

                    <td>

                        @if($booking->status == 'approved')

                        <span class="badge bg-success">
                            Approved
                        </span>

                        @elseif($booking->status == 'pending')

                        <span class="badge bg-warning">
                            Pending
                        </span>

                        @else

                        <span class="badge bg-danger">
                            Cancelled
                        </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('bookingChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun'
        ],

        datasets: [{

            label: 'Booking',

            data: [12, 19, 10, 15, 8, 20],

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

@endsection