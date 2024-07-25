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

                //para poder usar el id en suma.php
                $_SESSION['user_id'] = $row['id'];
                
                header('location:suma.php');
                exit();
            } else {
                header('location:index.php?error');
                exit();
            }
        } else {
            header('location:index.php?not_found');
            exit();
        }
    } else {
        header('location:index.php?empty');
        exit();
    }
}
?>