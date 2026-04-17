<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cuenta actualizada</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background:#f3f4f6; color:#111827;">
    <div style="max-width:640px; margin:40px auto; background:#ffffff; border-radius:18px; overflow:hidden; box-shadow:0 10px 25px rgba(0,0,0,.08);">
        <div style="background:linear-gradient(135deg,#54a8ff 0%,#3b82f6 100%); color:white; padding:28px 30px;">
            <h1 style="margin:0; font-size:28px;">Cuenta actualizada</h1>
            <p style="margin:10px 0 0 0; font-size:15px; opacity:.95;">
                Se realizaron cambios en tu cuenta del sistema Mundial 2026.
            </p>
        </div>

        <div style="padding:30px;">
            <p style="font-size:16px; margin-top:0;">Hola <strong>{{ $user->name }}</strong>,</p>

            <p style="font-size:15px; line-height:1.6;">
                Te informamos que la información de tu cuenta fue modificada correctamente.
            </p>

            @if(!empty($changes))
                <div style="margin:22px 0; padding:18px; background:#f8fafc; border:1px solid #e5e7eb; border-radius:14px;">
                    <p style="margin:0 0 12px 0; font-weight:700;">Cambios detectados:</p>
                    <ul style="margin:0; padding-left:18px;">
                        @foreach($changes as $change)
                            <li style="margin-bottom:8px;">{{ $change }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p style="font-size:15px; line-height:1.6;">
                Si no reconoces esta modificación, comunícate con el administrador del sistema.
            </p>

            <div style="margin-top:28px;">
                <a href="{{ route('home') }}"
                   style="display:inline-block; background:#2f8cff; color:white; text-decoration:none; padding:12px 22px; border-radius:12px; font-weight:700;">
                    Ir al sistema
                </a>
            </div>
        </div>

        <div style="background:#eef2f7; padding:18px 30px; font-size:13px; color:#64748b;">
            FIFA World Cup 2026 · Notificación automática del sistema
        </div>
    </div>
</body>
</html>