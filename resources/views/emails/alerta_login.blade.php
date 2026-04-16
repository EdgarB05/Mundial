<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .container{
            font-family:Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        .content{
            background: #ffff;
            padding: 20px;
            border-radius: 10px;
        }

        .btn{
            background: blue;
            color: #ffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    
    <center>
        <div class="container">
            <div class="content">
                <h1>Nuevo inicio de sesión detectado</h1>
                <p>Se ha detectado actividad nueva en tu cuenta</p>

                <a href="{{ route('acceso') }}" class="btn" style="color:white;">
                    Ir al sistema
                </a>

                <p style="margin-top:20px;">
                    Si no fuiste tú, solicita un cambio <br>
                    de contraseña al administrador.
                </p>

            </div>
        </div>
    </center>

</body>
</html>