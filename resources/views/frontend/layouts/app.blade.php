<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Padel Arena
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <!-- BOOTSTRAP -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- BOOTSTRAP ICON -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- GOOGLE FONT -->
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>

        body {

            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;

        }

        .navbar-custom {

            background: rgba(0,0,0,0.75);
            backdrop-filter: blur(10px);
            transition: 0.3s;

        }

        .navbar-brand {

            font-size: 1.5rem;
            letter-spacing: 1px;

        }

        .nav-link {

            color: white !important;
            font-weight: 500;
            margin-left: 10px;

        }

        .nav-link:hover {

            color: #22c55e !important;

        }

        .btn-success {

            background: #22c55e;
            border: none;

        }

        .btn-success:hover {

            background: #16a34a;

        }

        .card {

            border-radius: 20px;

        }

        .card img:hover {

            transform: scale(1.05);

        }

        footer {

            margin-top: 0;

        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top py-3">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold"
            href="/">

            <i class="bi bi-dribbble me-2 text-success"></i>
            Padel Arena

        </a>

        <!-- TOGGLER -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse"
            id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">

                    <a class="nav-link"
                        href="/">

                        Home
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                        href="/courts">

                        Lapangan
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link"
                        href="/contact">

                        Kontak Kami

                    </a>

                </li>

                @auth

                <li class="nav-item">

                    <a class="nav-link"
                        href="/my-bookings">

                        Booking Saya
                    </a>

                </li>

                @if(auth()->user()->is_admin)

                <li class="nav-item">

                    <a class="nav-link"
                        href="/admin/dashboard">

                        Dashboard
                    </a>

                </li>

                @endif

                <li class="nav-item ms-lg-3">

                    <form action="{{ route('logout') }}"
                        method="POST">

                        @csrf

                        <button class="btn btn-success px-4">

                            Logout

                        </button>

                    </form>

                </li>

                @else

                <li class="nav-item ms-lg-3">

                    <a href="/login"
                        class="btn btn-outline-light me-2">

                        Login
                    </a>

                </li>

                <li class="nav-item">

                    <a href="/register"
                        class="btn btn-success px-4">

                        Register
                    </a>

                </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<!-- CONTENT -->
<main>

    @yield('content')

</main>

<!-- BOOTSTRAP JS -->
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>