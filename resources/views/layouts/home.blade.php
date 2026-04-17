<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIFA World Cup 2026</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/e6129c82fa.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f6f9;
        }

        .hero-section {
            min-height: 100vh;
            color: white;
            display: flex;
            align-items: center;
        }

        .section-pattern {
            background-color: #f8fafc;
            background-image: linear-gradient(30deg, rgba(37, 141, 244, 0.05) 12%, transparent 12.5%, transparent 87%, rgba(37, 141, 244, 0.05) 87.5%, rgba(37, 141, 244, 0.05));
            background-size: 80px 140px;
        }

        .match-card, .news-card, .city-card {
            border: 0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .match-card:hover, .news-card:hover, .city-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 35px rgba(0,0,0,.12);
        }

        .navbar-home {
            background: rgba(255,255,255,.96);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid #e5e7eb;
        }

        .brand-logo {
            font-weight: 900;
            color: #1d4ed8;
            letter-spacing: .5px;
            text-decoration: none;
            font-size: 1.9rem;
        }

        .footer-home {
            background: #ffffff;
            border-top: 1px solid #e5e7eb;
            color: #64748b;
        }

        .footer-home .footer-brand {
            font-weight: 900;
            color: #111827;
            font-size: 1.1rem;
        }

        .footer-home a {
            color: #64748b;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-home a:hover {
            color: #2563eb;
        }

        .city-image,
        .news-image {
            height: 220px;
            object-fit: cover;
            width: 100%;
        }

        .hero-btn-outline {
            border: 1px solid rgba(255,255,255,.7);
            color: white;
        }

        .hero-btn-outline:hover {
            background: rgba(255,255,255,.12);
            color: white;
        }

        @media (max-width: 768px) {
            .brand-logo {
                font-size: 1.4rem;
            }

            .footer-home .row > div {
                text-align: center !important;
                margin-bottom: 12px;
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-home shadow-sm">
        <div class="container-fluid px-4 py-3">
            <a href="{{ route('home') }}" class="brand-logo">FIFA WORLD CUP 2026</a>

            <div class="ms-auto d-flex align-items-center gap-4">
                <a href="{{ route('home') }}" class="text-secondary text-decoration-none fs-3">
                    Inicio
                </a>

                <a href="{{ route('boletos.index') }}" class="text-secondary text-decoration-none fs-3">
                    Boletos
                </a>

                @guest
                    <a href="{{ route('acceso') }}" class="btn btn-primary px-4 py-2 fw-semibold">
                        Iniciar sesión
                    </a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="footer-home py-4 mt-auto">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col-md-3 text-start">
                    <div class="footer-brand">FIFA World Cup 2026</div>
                </div>

                <div class="col-md-6 text-center">
                    <a href="{{ route('home') }}">Privacy Policy</a>
                    <a href="{{ route('home') }}">Terms of Service</a>
                    <a href="{{ route('home') }}">Cookie Policy</a>
                    <a href="{{ route('home') }}">Contact Us</a>
                </div>

                <div class="col-md-3 text-end">
                    © 2026 FIFA World Cup™ - All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>

</body>
</html>