<?php
// Incluye el archivo de inicio de sesión
include("controller/login_user.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <!-- Boxicons -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
           <h1>Iniciar Sesión</h1>

           <?php
            if (isset($_GET['error'])) {
                echo '<div class="alert alert-danger">Error: Contraseña incorrecta.</div>';
            } elseif (isset($_GET['empty'])) {
                echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
            } elseif (isset($_GET['not_found'])) {
                echo '<div class="alert alert-danger">Error: Usuario no encontrado.</div>';
            }
           ?>
           <div class="input-box">
                <input type="text" placeholder="Usuario" id="usuario" name="usuario" required>
           </div>
           
           <div class="input-box">
                <input type="password" placeholder="Contraseña" id="contrasena" name="contrasena">
           </div>

           <button type="submit" class="btn" name="login">Iniciar Sesión</button>

           <div class="register-link">
            <p>¿No tienes una cuenta? <a href="register.php">Registrarse</a></p>
           </div>
        </form>
    </div>
</body>
</html>
