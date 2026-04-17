<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIFA World Cup 2026</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e6129c82fa.js" crossorigin="anonymous"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #111827;
        }

        .home-navbar {
            background: rgba(255,255,255,.95);
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

        .auth-page {
            min-height: calc(100vh - 170px);
            padding: 36px 12px 48px;
            background:
                radial-gradient(circle at 1px 1px, rgba(148,163,184,.22) 1px, transparent 0);
            background-size: 26px 26px;
        }

        .auth-card {
            max-width: 620px;
            margin: 0 auto;
            border-radius: 22px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.10);
            border: 1px solid #e5e7eb;
        }

        .auth-hero {
            position: relative;
            min-height: 200px;
            background:
                linear-gradient(rgba(0,0,0,.28), rgba(0,0,0,.28)),
                url('{{ asset('img/register-hero.jpg') }}') center/cover no-repeat;
            display: flex;
            align-items: flex-end;
            padding: 28px 34px;
        }

        .auth-hero-title {
            color: white;
            font-size: 3rem;
            line-height: 1;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .auth-hero-text {
            color: rgba(255,255,255,.92);
            font-size: 1.2rem;
            margin-bottom: 0;
        }

        .auth-body {
            padding: 38px 34px 30px;
        }

        .auth-label {
            font-size: .95rem;
            font-weight: 800;
            color: #64748b;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .input-shell {
            position: relative;
            margin-bottom: 28px;
        }

        .input-shell .form-control,
        .input-shell .form-select {
            height: 62px;
            border-radius: 14px;
            border: 1px solid #cbd5e1;
            background: #eef2f7;
            padding-left: 46px;
            font-size: 1.1rem;
            color: #334155;
            box-shadow: none;
        }

        .input-shell .form-control:focus,
        .input-shell .form-select:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 4px rgba(59,130,246,.12);
            background: #f8fbff;
        }

        .input-shell .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 1.1rem;
            z-index: 2;
        }

        .input-shell.password-shell .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            cursor: pointer;
            z-index: 2;
        }

        .input-shell.password-shell .form-control {
            padding-right: 46px;
        }

        .auth-submit {
            width: 100%;
            height: 64px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(90deg, #3292f2 0%, #2f8cff 100%);
            color: white;
            font-size: 1.35rem;
            font-weight: 800;
            box-shadow: 0 14px 24px rgba(50,146,242,.25);
            transition: .2s ease;
        }

        .auth-submit:hover {
            transform: translateY(-1px);
            background: linear-gradient(90deg, #2487ec 0%, #247ef2 100%);
        }

        .auth-links {
            text-align: center;
            margin-top: 26px;
            font-size: 1.15rem;
            color: #64748b;
        }

        .auth-links a {
            color: #2f8cff;
            font-weight: 800;
            text-decoration: none;
        }

        .auth-links a:hover {
            text-decoration: underline;
        }

        .auth-bottom {
            background: #eef2f7;
            padding: 18px;
            display: flex;
            justify-content: center;
            gap: 34px;
            color: #94a3b8;
            font-size: 1.6rem;
        }

        .site-footer {
            background: #ffffff;
            border-top: 1px solid #e5e7eb;
            padding: 26px 0;
            margin-top: 0;
        }

        .site-footer .footer-brand {
            font-weight: 900;
            font-size: 1.1rem;
            color: #111827;
        }

        .site-footer a {
            color: #64748b;
            text-decoration: none;
            margin: 0 10px;
        }

        .site-footer a:hover {
            color: #2563eb;
        }

        @media (max-width: 768px) {
            .auth-card {
                max-width: 100%;
            }

            .auth-hero {
                min-height: 160px;
                padding: 22px 20px;
            }

            .auth-body {
                padding: 26px 20px 24px;
            }

            .auth-hero-title {
                font-size: 2.2rem;
            }

            .auth-hero-text {
                font-size: 1rem;
            }

            .brand-logo {
                font-size: 1.4rem;
            }

            .site-footer .row > div {
                text-align: center !important;
                margin-bottom: 12px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg home-navbar">
        <div class="container-fluid px-4 py-3">
            <a href="{{ route('home') }}" class="brand-logo">FIFA WORLD CUP 2026</a>

            <div class="ms-auto d-flex align-items-center gap-3">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('boletos.index') }}">Boletos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="auth-page">
        @yield('content')
    </main>

    <footer class="site-footer">
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

                <div class="col-md-3 text-end text-muted">
                    © 2026 FIFA World Cup™ - All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggles = document.querySelectorAll('.toggle-password');

            toggles.forEach(toggle => {
                toggle.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);

                    if (!input) return;

                    input.type = input.type === 'password' ? 'text' : 'password';
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            });
        });
    </script>
</body>
</html>