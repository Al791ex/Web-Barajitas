<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- Boxicons -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
           <h1>Registrate Aquí</h1>
           <?php
            include("controller/register_user.php");

            if (isset($_GET['register'])){
                echo "<div class='alert alert-success'>Usuario registrado con éxito</div>";
            } elseif (isset($_GET['error'])) {
                echo '<div class="alert alert-danger">Error: Usuario ya registrado.</div>';
            }
           ?>
           
           <div class="input-box">
                <input type="text" placeholder="Usuario" id="usuario" name="usuario" required>
           </div>
           
           <div class="input-box">
                <input type="password" placeholder="Contraseña" id="contrasena" name="contrasena">
           </div>

           <div class="input-box">
            <input type="password" placeholder=" Confirma la contraseña" id="confirmar_contra" name="confirmar_contra">
            </div>

           <button type="submit" class="btn" name="register">Registrarse</button>
        </form>
    </div>
</body>
</html>