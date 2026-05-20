<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="bg-dark text-white p-3"
        style="width:250px; min-height:100vh;">

        <h3 class="mb-4">
            Padel Admin
        </h3>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="/admin/dashboard"
                    class="nav-link text-white">

                    <i class="bi bi-grid"></i>
                    Dashboard
                </a>
            </li>

            @if(auth()->user()->role == 'super_admin')

            <li class="nav-item mb-2">

                <a href="/admin/users"
                    class="nav-link text-white">

                    <i class="bi bi-people"></i>
                    Kelola User

                </a>

            </li>

            @endif

            <li class="nav-item mb-2">
                <a href="/admin/courts"
                    class="nav-link text-white">

                    <i class="bi bi-building"></i>
                    Lapangan
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="/admin/bookings"
                    class="nav-link text-white">

                    <i class="bi bi-calendar-check"></i>
                    Booking
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="/admin/calendar"
                    class="nav-link text-white">

                    <i class="bi bi-calendar-event"></i>
                    Kalender Booking
                </a>
            </li>

        </ul>

    </div>

    <!-- CONTENT -->
    <div class="flex-grow-1">

        <!-- NAVBAR -->
        <nav class="navbar navbar-light bg-white shadow-sm px-4">

            <span class="navbar-brand mb-0 h4">
                Dashboard Admin
            </span>

            <div>

                {{ auth()->user()->name }}

                <form action="{{ route('logout') }}"
                    method="POST"
                    class="d-inline">

                    @csrf

                    <button class="btn btn-danger btn-sm">
                        Logout
                    </button>

                </form>

            </div>

        </nav>

        <!-- PAGE CONTENT -->
        <div class="p-4">

            @yield('content')

        </div>

    </div>

</div>

</body>
</html>