<?php
// Inicia el búfer de salida
ob_start();

// Inicia la sesión antes de cualquier salida
session_start();

include("conexion.php");

// Configuración de reporte de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['login'])) {
    if (!empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        
        // Consultar la base de datos usando la API procedural
        $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
        
        $result = mysqli_query($con, $query);
        
        if (!$result) {
            die('Error en la consulta: ' . mysqli_error($con));
        }

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            if (password_verify($contrasena, $row['contrasena'])) {
                $_SESSION['usuario'] = $usuario;

                // Para poder usar el id en suma.php
                $_SESSION['user_id'] = $row['id'];
                
                // Redirección
                header('Location:suma.php');
                exit();
                
            } else {
                header('Location: index.php?error=1');
                exit();
            }
        } else {
            header('Location: index.php?not_found=1');
            exit();
        }
    } else {
        header('Location: index.php?empty=1');
        exit();
    }
}

// Limpia y envía el búfer de salida
ob_end_flush();
?>
