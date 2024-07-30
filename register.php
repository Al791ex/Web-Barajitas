<?php
include("controller/conexion.php");

// Configuración de reporte de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$register_success = false;
$error_message = '';

if (isset($_POST['register'])) {
    if (!empty($_POST['usuario']) && !empty($_POST['contrasena']) && !empty($_POST['confirmar_contra'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $confirmar_contra = $_POST['confirmar_contra'];
        
        if ($contrasena != $confirmar_contra) {
            $error_message = 'Las contraseñas no coinciden';
        } else {
            // Hash de la contraseña
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

            // Consultar la base de datos usando la API procedural
            $query = "INSERT INTO usuario (nombre, contrasena) VALUES ('$usuario', '$hashed_password')";

            try {
                if (mysqli_query($con, $query)) {
                    $register_success = true;
                } else {
                    $error_message = 'Error al registrar el usuario';
                }
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) { // Código de error para clave duplicada
                    $error_message = 'Usuario ya registrado.';
                } else {
                    $error_message = 'Error al registrar el usuario: ' . $e->getMessage();
                }
            }
        }
    } else {
        $error_message = 'Alguno de los campos está vacío';
    }

    if ($register_success) {
        header('Location: index.php?success');
        exit();
    } elseif ($error_message) {
        header('Location: register.php?error=' . urlencode($error_message));
        exit();
    }
}

?>

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
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
           <h1>Registrate Aquí</h1>
           <?php
            if (isset($_GET['error'])) {
                echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($_GET['error']) . '</div>';
            }
           ?>
           
           <div class="input-box">
                <input type="text" placeholder="Usuario" id="usuario" name="usuario" required>
           </div>
           
           <div class="input-box">
                <input type="password" placeholder="Contraseña" id="contrasena" name="contrasena">
           </div>

           <div class="input-box">
                <input type="password" placeholder="Confirma la contraseña" id="confirmar_contra" name="confirmar_contra">
           </div>

           <button type="submit" class="btn" name="register">Registrarse</button>
        </form>
    </div>
</body>
</html>
