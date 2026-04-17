<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador - Mundial 2026</title>

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

        .admin-dashboard {
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

        .dashboard-header {
            margin-bottom: 22px;
        }

        .dashboard-header h1 {
            font-size: 2.1rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
        }

        .dashboard-header p {
            color: #64748b;
            margin-bottom: 0;
        }

        .panel-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 22px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }

        .panel-card-header {
            background: linear-gradient(135deg, #54a8ff 0%, #3b82f6 100%);
            color: white;
            padding: 24px 26px 30px;
            position: relative;
        }

        .panel-card-header::after {
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

        .panel-badge {
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

        .panel-title {
            font-size: 1.8rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .panel-subtitle {
            font-size: 1rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 0;
        }

        .panel-card-body {
            padding: 24px;
        }

        .top-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .action-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-strong-primary {
            background: linear-gradient(90deg, #3292f2 0%, #2f8cff 100%);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 18px;
            font-weight: 800;
            box-shadow: 0 14px 24px rgba(50,146,242,.22);
        }

        .btn-strong-primary:hover {
            color: white;
            background: linear-gradient(90deg, #2487ec 0%, #247ef2 100%);
        }

        .btn-soft {
            border-radius: 14px;
            font-weight: 700;
            padding: 12px 18px;
        }

        .table-wrapper {
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            overflow: hidden;
            background: #fff;
        }

        .table-custom {
            margin-bottom: 0;
        }

        .table-custom thead th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .7px;
            border-bottom: 1px solid #e5e7eb;
            padding: 16px 14px;
            vertical-align: middle;
        }

        .table-custom tbody td {
            padding: 16px 14px;
            vertical-align: middle;
            color: #334155;
            border-color: #eef2f7;
        }

        .table-custom tbody tr:hover {
            background: #f8fbff;
        }

        .role-pill {
            display: inline-block;
            border-radius: 999px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .6px;
        }

        .role-admin {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .role-empleado {
            background: #dcfce7;
            color: #15803d;
        }

        .role-cliente {
            background: #f3e8ff;
            color: #7e22ce;
        }

        .table-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .table-btn {
            border-radius: 12px;
            padding: 8px 12px;
            font-weight: 700;
        }

        @media (max-width: 991px) {
            .dashboard-header h1 {
                font-size: 1.7rem;
            }

            .panel-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>