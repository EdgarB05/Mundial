<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar boleto - Mundial 2026</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e6129c82fa.js" crossorigin="anonymous"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            background-image:
                linear-gradient(30deg, rgba(37, 99, 235, 0.04) 12%, transparent 12.5%, transparent 87%, rgba(37, 99, 235, 0.04) 87.5%, rgba(37, 99, 235, 0.04)),
                linear-gradient(150deg, rgba(37, 99, 235, 0.04) 12%, transparent 12.5%, transparent 87%, rgba(37, 99, 235, 0.04) 87.5%, rgba(37, 99, 235, 0.04));
            background-size: 80px 140px;
            color: #111827;
        }

        .create-page {
            min-height: 100vh;
            padding: 32px 0;
        }

        .create-wrapper {
            max-width: 1280px;
            margin: 0 auto;
        }

        .create-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        }

        .create-header {
            background: linear-gradient(135deg, #54a8ff 0%, #3b82f6 100%);
            color: white;
            padding: 28px 30px 34px;
            position: relative;
        }

        .create-header::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -1px;
            height: 12px;
            background:
                radial-gradient(circle at 6px -1px, transparent 6px, #ffffff 7px);
            background-size: 18px 12px;
            background-repeat: repeat-x;
        }

        .create-badge {
            display: inline-block;
            background: rgba(255,255,255,0.92);
            color: #334155;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 999px;
            padding: 7px 14px;
            margin-bottom: 14px;
        }

        .create-title {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .create-subtitle {
            font-size: 1rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 0;
        }

        .create-body {
            padding: 30px;
        }

        .section-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 22px;
            height: 100%;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 800;
            color: #334155;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 18px;
        }

        .input-shell {
            position: relative;
            margin-bottom: 18px;
        }

        .input-shell .form-control,
        .input-shell .form-select {
            min-height: 54px;
            border-radius: 14px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            padding-left: 44px;
            color: #334155;
            box-shadow: none;
        }

        .input-shell .form-control:focus,
        .input-shell .form-select:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 4px rgba(59,130,246,.12);
        }

        .input-shell .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            z-index: 2;
        }

        .field-label {
            font-size: .9rem;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 8px;
        }

        .top-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .btn-primary-strong {
            background: linear-gradient(90deg, #3292f2 0%, #2f8cff 100%);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 18px;
            font-weight: 800;
            box-shadow: 0 14px 24px rgba(50,146,242,.22);
        }

        .btn-primary-strong:hover {
            color: white;
            background: linear-gradient(90deg, #2487ec 0%, #247ef2 100%);
        }

        .btn-outline-soft {
            border-radius: 14px;
            font-weight: 700;
            padding: 12px 18px;
        }

        .results-scroll {
            max-height: 840px;
            overflow-y: auto;
            padding-right: 4px;
        }

        .match-card {
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
            background: white;
        }

        .match-card .card-title {
            font-weight: 800;
            color: #0f172a;
        }

        .match-card .card-text {
            color: #475569;
        }

        .match-image {
            width: 100%;
            height: 100%;
            min-height: 220px;
            object-fit: cover;
        }

        .placeholder-image {
            width: 100%;
            min-height: 220px;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            font-size: 2rem;
        }

        .api-alert {
            border-radius: 14px;
        }

        .submit-area {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .sticky-box {
            position: sticky;
            top: 20px;
        }

        @media (max-width: 991px) {
            .sticky-box {
                position: static;
            }

            .create-title {
                font-size: 1.6rem;
            }

            .create-body {
                padding: 20px;
            }

            .create-header {
                padding: 24px 20px 30px;
            }
        }
    </style>
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>