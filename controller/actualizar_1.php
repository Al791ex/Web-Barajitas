<?php include ("header.php") ?>
<?php include ("conexion.php") ?>




<?php 
//consigue los datos de la fila que se va a actualizar

if(isset($_GET['id'])){
    $id = $_GET['id'];



    $query = "select * from empleados where id = '$id'";

    
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Fallo el query");
    }

    //rows de la tabla, sacando los datos de la base de datos
    else{        
        $row = mysqli_fetch_row($result);   
    }

}

//la logica para actualizar

if(isset($_POST['u_empleado'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }



    $u_nombre = $_POST['u_nombre'];
    $u_apellido = $_POST['u_apellido'];
    $u_cargo = $_POST['u_cargo'];


    //revisa si estan vacios
    if ($u_nombre == "" || empty($u_nombre)){
        header('location:index.php?error=Falta el nombre');
    
    }

    else if($u_apellido == "" || empty($u_apellido)){
        header('location:index.php?error=Falta el apellido');
    }

    else if($u_cargo == "" || empty($u_cargo)){
        header('location:index.php?error=Falta el cargo');
    }

    //y si no estan vacios realiza el query
    else {

    $query = "update empleados set nombre = '$u_nombre', apellido = '$u_apellido', cargo = '$u_cargo' where id = '$idnew'";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Fallo el query");
    }

    else{
        header('location:index.php?update=Actualizado');
    }

}
}

?>

 <form action="actualizar_1.php?id_new=<?php echo $id?>" method="post">
   <div class="form-group">

   

        <label for="u_nombre">Nombre</label>
        <input type="text" name="u_nombre" class="form-control" value="<?php echo $row[1]?>">

        <label for="u_apellido">Apellido</label>
        <input type="text" name="u_apellido" class="form-control" value="<?php echo $row[2]?>">

        <label for="u_cargo">Cargo</label>
        <input type="text" name="u_cargo" class="form-control" value="<?php echo $row[3]?>">

    </div>
    <input type="submit" class="btn btn-success" name="u_empleado" value="Actualizar">
</form>


<?php include ("footer.php") ?>