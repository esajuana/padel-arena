@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Data Booking</h2>

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

                    <th>User</th>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Durasi</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($bookings as $booking)

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
                        {{ substr($booking->start_time,0,5) }}
                        -
                        {{ substr($booking->end_time,0,5) }}
                    </td>

                    <td>
                        {{ $booking->duration }} Jam
                    </td>

                    <td>
                        Rp {{ number_format($booking->total_price) }}
                    </td>

                    <td>

                        @if($booking->status == 'pending')

                        <span class="badge bg-warning">
                            Pending
                        </span>

                        @elseif($booking->status == 'approved')

                        <span class="badge bg-success">
                            Approved
                        </span>

                        @else

                        <span class="badge bg-danger">
                            Cancelled
                        </span>

                        @endif

                    </td>

                <td style="min-width:220px;">

                    <div class="d-flex flex-wrap gap-2">

                        <!-- APPROVE -->
                        <a
                            href="/admin/bookings/{{ $booking->id }}/status/approved"
                            class="btn btn-success btn-sm"
                        >

                            Approve

                        </a>

                        <!-- CANCEL -->
                        <a
                            href="/admin/bookings/{{ $booking->id }}/status/cancelled"
                            class="btn btn-warning btn-sm text-white"
                        >

                            Cancel

                        </a>

                        <!-- DETAIL -->
                        <a
                            href="/admin/bookings/{{ $booking->id }}/detail"
                            class="btn btn-info btn-sm text-white"
                        >

                            Detail

                        </a>

                        <!-- INVOICE -->
                        <a
                            href="/admin/bookings/{{ $booking->id }}/invoice"
                            class="btn btn-primary btn-sm"
                        >

                            Invoice

                        </a>

                        <!-- DELETE -->
                        <form
                            action="/admin/bookings/{{ $booking->id }}"
                            method="POST"
                            onsubmit="return confirm(
                                'Yakin ingin menghapus booking ini?'
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

                    </div>

                </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection