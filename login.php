<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
           <h1>Iniciar Sesión</h1>
           <div class="input-box">
                <input type="text" placeholder="Usuario" required>
           </div>
           
           <div class="input-box">
                <input type="password" placeholder="Contraseña">
           </div>

           <button type="submit" class="btn" name="login">Iniciar Sesión</button>

           <div class="register-link">
            <p>¿No tienes una cuenta?<a href="#">Registrarse</a></p>
           </div>
        </form>
    </div>
</body>
</html>