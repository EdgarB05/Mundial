<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de voluntariado - Mundial 2026</title>

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

        .page-wrap {
            min-height: 100vh;
            padding: 34px 12px;
        }

        .page-inner {
            max-width: 980px;
            margin: 0 auto;
        }

        .page-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        }

        .page-header {
            background: linear-gradient(135deg, #54a8ff 0%, #3b82f6 100%);
            color: white;
            padding: 28px 30px 34px;
            position: relative;
        }

        .page-header::after {
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

        .page-badge {
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

        .page-title {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .page-subtitle {
            font-size: 1rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 0;
        }

        .page-body {
            padding: 30px;
        }

        .section-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 22px;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 800;
            color: #334155;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 18px;
        }

        .field-label {
            font-size: .9rem;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 8px;
        }

        .input-shell {
            position: relative;
            margin-bottom: 18px;
        }

        .input-shell .form-control,
        .input-shell .form-select {
            min-height: 56px;
            border-radius: 14px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            padding-left: 44px;
            color: #334155;
            box-shadow: none;
        }

        .input-shell textarea.form-control {
            min-height: 120px;
            padding-top: 14px;
            resize: vertical;
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

        .input-shell.textarea-shell .input-icon {
            top: 20px;
            transform: none;
        }

        .alert {
            border-radius: 14px;
        }

        .action-row {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .btn-save {
            background: linear-gradient(90deg, #3292f2 0%, #2f8cff 100%);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 800;
            box-shadow: 0 14px 24px rgba(50,146,242,.22);
        }

        .btn-save:hover {
            color: white;
            background: linear-gradient(90deg, #2487ec 0%, #247ef2 100%);
        }

        .btn-back {
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 800;
        }

        @media (max-width: 768px) {
            .page-body {
                padding: 20px;
            }

            .page-header {
                padding: 24px 20px 30px;
            }

            .page-title {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>