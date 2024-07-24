<?php
include("conexion.php");

if (isset($_POST['login'])) {
    if (!empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        
        // Consultar la base de datos usando la API procedural
        $query = "SELECT * FROM usuario WHERE nombre = '$usuario'";
        
        $result = mysqli_query($con, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            if (password_verify($contrasena, $row['contrasena'])) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header('location:si.html');
            } else {
                header('location:index.php?error');
            }
        } else {
            header('location:index.php?not_found');
        }
    } else {
        header('location:index.php?empty');
    }
}
?>