<?php
include("conexion.php");

// Configuración de reporte de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['register'])) {
    if (!empty($_POST['usuario']) && !empty($_POST['contrasena']) && !empty($_POST['confirmar_contra'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $confirmar_contra = $_POST['confirmar_contra'];
        
        if ($contrasena != $confirmar_contra) {
            echo '<div class="alert alert-warning">Las contraseñas no coinciden</div>';
        }

        // Hash de la contraseña
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

        // Consultar la base de datos usando la API procedural
        $query = "INSERT INTO usuario (nombre, contrasena) VALUES ('$usuario', '$hashed_password')";

        try {
            if (mysqli_query($con, $query)) {
                header('location:index.php');
                exit(); 
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // Código de error para clave duplicada
                echo '<div class="alert alert-danger">Error: Usuario ya registrado.</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar el usuario: ' . $e->getMessage() . '</div>';
            }
        }
    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }
}
?>