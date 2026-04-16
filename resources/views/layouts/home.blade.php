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
            background:
                linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)),
                url('https://images.unsplash.com/photo-1508098682722-e99c643e7f0b') center/cover no-repeat;
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
            background: rgba(255,255,255,.9);
            backdrop-filter: blur(8px);
        }

        .footer-home {
            background: #111827;
            color: white;
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
    </style>
</head>
<body>
    @yield('content')
</body>
</html>