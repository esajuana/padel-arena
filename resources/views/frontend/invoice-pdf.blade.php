<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>
        Invoice Booking
    </title>

    <style>

        body {

            font-family: sans-serif;

            color: #333;

        }

        .container {

            width: 100%;

        }

        .header {

            margin-bottom: 30px;

        }

        .title {

            font-size: 28px;

            font-weight: bold;

        }

        .text-muted {

            color: #777;

        }

        table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 20px;

        }

        table th,
        table td {

            border: 1px solid #ddd;

            padding: 12px;

        }

        table th {

            background: #f5f5f5;

            text-align: left;

        }

        .total {

            margin-top: 30px;

            text-align: right;

            font-size: 22px;

            font-weight: bold;

            color: green;

        }

        .footer {

            margin-top: 50px;

            text-align: center;

            color: #888;

            font-size: 14px;

        }

    </style>

</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">

        <div class="title">
            INVOICE
        </div>

        <p class="text-muted">

            Booking Lapangan Padel

        </p>

    </div>

    <hr>

    <!-- CUSTOMER -->
    <table>

        <tr>

            <th width="30%">
                Customer
            </th>

            <td>
                {{ $booking->user->name }}
            </td>

        </tr>

        <tr>

            <th>
                Email
            </th>

            <td>
                {{ $booking->user->email }}
            </td>

        </tr>

        <tr>

            <th>
                Invoice ID
            </th>

            <td>
                #BOOK-{{ $booking->id }}
            </td>

        </tr>

        <tr>

            <th>
                Status
            </th>

            <td>
                {{ ucfirst($booking->status) }}
            </td>

        </tr>

    </table>

    <!-- BOOKING -->
    <table>

        <thead>

            <tr>

                <th>Lapangan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Durasi</th>
                <th>Total</th>

            </tr>

        </thead>

        <tbody>

            <tr>

                <td>
                    {{ $booking->court->name }}
                </td>

                <td>
                    {{ $booking->booking_date }}
                </td>

                <td>

                    {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                    -
                    {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}

                </td>

                <td>
                    {{ $booking->duration }} Jam
                </td>

                <td>

                    Rp {{ number_format($booking->total_price) }}

                </td>

            </tr>

        </tbody>

    </table>

    <!-- TOTAL -->
    <div class="total">

        Total:
        Rp {{ number_format($booking->total_price) }}

    </div>

    <!-- FOOTER -->
    <div class="footer">

        Terima kasih telah melakukan booking
        lapangan padel.

    </div>

</div>


</body>
</html>