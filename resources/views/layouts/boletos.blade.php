<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletos - Mundial 2026</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e6129c82fa.js" crossorigin="anonymous"></script>

    <style>
        body {
            background: #f3f4f6;
            font-family: Arial, sans-serif;
            background-image:
                linear-gradient(30deg, rgba(37, 99, 235, 0.04) 12%, transparent 12.5%, transparent 87%, rgba(37, 99, 235, 0.04) 87.5%, rgba(37, 99, 235, 0.04)),
                linear-gradient(150deg, rgba(37, 99, 235, 0.04) 12%, transparent 12.5%, transparent 87%, rgba(37, 99, 235, 0.04) 87.5%, rgba(37, 99, 235, 0.04));
            background-size: 80px 140px;
            margin: 0;
        }

        .tickets-dashboard {
            min-height: 100vh;
            padding: 24px 0;
        }

        .dashboard-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.07);
        }

        .sidebar-card {
            padding: 24px 18px;
            height: auto;
        }

        .profile-avatar {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            background: #fde4d3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            margin: 0 auto 15px;
            border: 4px solid #dbeafe;
            color: #475569;
        }

        .user-role-badge {
            display: inline-block;
            background: #e5e7eb;
            color: #374151;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 18px;
            border-radius: 999px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #111827;
            font-weight: 600;
            padding: 12px 14px;
            border-radius: 14px;
            margin-bottom: 10px;
            transition: .2s ease;
            font-size: 14px;
        }

        .sidebar-menu a.active {
            background: #2f8cff;
            color: #fff;
            box-shadow: 0 10px 20px rgba(47, 140, 255, 0.25);
        }

        .sidebar-menu a:hover {
            background: #eff6ff;
        }

        .signout-btn {
            border: 1px solid #fecaca;
            color: #dc2626;
            background: #fff5f5;
            border-radius: 14px;
            padding: 14px;
            font-weight: 700;
            width: 100%;
        }

        .dashboard-header h1 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
        }

        .dashboard-header p {
            color: #64748b;
            margin-bottom: 0;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: #111827;
        }

        .ticket-box {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.08);
            width: 100%;
            height: auto;
        }

        .ticket-top {
            min-height: 118px;
            padding: 14px 16px 18px;
            color: #fff;
            background: linear-gradient(135deg, #54a8ff 0%, #3b82f6 100%);
            position: relative;
        }

        .ticket-top::after {
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

        .ticket-top.blue {
            background: linear-gradient(135deg, #54a8ff 0%, #3b82f6 100%);
        }

        .ticket-top.green {
            background: linear-gradient(135deg, #2dbd8f 0%, #218b71 100%);
        }

        .ticket-top.red {
            background: linear-gradient(135deg, #ef476f 0%, #d9345f 100%);
        }

        .ticket-label {
            background: rgba(255,255,255,0.92);
            color: #475569;
            font-size: 10px;
            font-weight: 800;
            padding: 6px 10px;
            border-radius: 8px;
            letter-spacing: 1px;
            text-transform: uppercase;
            display: inline-block;
            max-width: 70%;
            line-height: 1.2;
        }

        .ticket-status {
            font-size: 10px;
            font-weight: 800;
            padding: 6px 10px;
            border-radius: 999px;
            color: #fff;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .status-confirmed {
            background: #22c55e;
        }

        .status-pending {
            background: #f59e0b;
        }

        .ticket-main-title {
            font-weight: 800;
            font-size: 1.2rem;
            color: #ffffff;
            line-height: 1.15;
            margin-top: 16px;
            text-transform: uppercase;
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
            max-width: 100%;
        }

        .ticket-body {
            padding: 16px 16px 16px;
        }

        .ticket-date-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 14px;
        }

        .ticket-meta-label {
            font-size: 11px;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 4px;
        }

        .ticket-meta-value {
            font-size: 14px;
            font-weight: 700;
            color: #334155;
            word-break: break-word;
        }

        .ticket-section-grid {
            background: #f8fafc;
            border-radius: 14px;
            padding: 12px 10px;
            margin: 14px 0 16px;
        }

        .ticket-detail {
            color: #64748b;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .ticket-btn {
            background: #2f8cff;
            color: white;
            border-radius: 12px;
            padding: 11px 12px;
            width: 100%;
            margin-top: 8px;
            border: none;
            font-weight: 700;
            box-shadow: 0 10px 18px rgba(47, 140, 255, 0.25);
            font-size: 14px;
        }

        .ticket-btn:hover {
            background: #1f7df3;
            color: white;
        }

        .ticket-actions {
            margin-top: 14px;
        }

        .buy-more-card {
            border: 2px dashed #d1d5db;
            border-radius: 20px;
            min-height: 320px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: rgba(255,255,255,0.7);
            padding: 30px;
            width: 100%;
        }

        .buy-more-card a {
            text-decoration: none;
            color: #111827;
        }

        .buy-more-card .plus {
            font-size: 48px;
            color: #2f8cff;
            margin-bottom: 12px;
        }

        @media (max-width: 991px) {
            .dashboard-header h1 {
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 767px) {
            .ticket-date-row {
                flex-direction: column;
                gap: 8px;
            }

            .ticket-label {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>