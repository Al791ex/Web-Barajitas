<?php 
include ("controller/conexion.php");

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

$currentUser = $_SESSION['user_id'];

$refreshing = 0;

try {
    $query = "select * from operaciones where usuario = '$currentUser'";
    $result = mysqli_query($con, $query);
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger">Debes iniciar sesión para hacer esta operacion: ' . $e->getMessage() . '</div>';
}

$rowNumber = mysqli_num_rows($result);


//esto lo que hace es que revisa si ya existe el usuario en la tabla operaciones y si no existe lo crea
if ($rowNumber < 1){       
    $query2 = "insert into operaciones (usuario) values ('$currentUser')";

    $result2 = mysqli_query($con, $query2);

    $query = "select * from operaciones where usuario = '$currentUser'";
    $result = mysqli_query($con, $query);
    
}

$row = mysqli_fetch_assoc($result);


$sum1_completed = $row['suma1'];
$sum2_completed = $row['suma2'];

$sum3_completed = $row['suma3'];
$sum4_completed = $row['suma4'];
$sum5_completed = $row['suma5'];
$sum6_completed = $row['suma6'];
$sum7_completed = $row['suma7'];
$sum8_completed = $row['suma8'];

$sub1_completed = $row['resta1'];
$sub2_completed = $row['resta2'];

$sub3_completed = $row['resta3'];
$sub4_completed = $row['resta4'];
$sub5_completed = $row['resta5'];
$sub6_completed = $row['resta6'];
$sub7_completed = $row['resta7'];
$sub8_completed = $row['resta8'];


// Inicializamos las variables para la primera pagina, sumas de 1 o 2 digitos
$sum1_operand1 = rand(1, 99);
$sum1_operand2 = rand(1, 99);
$sum1_result = $sum1_operand1 + $sum1_operand2;

$sum2_operand1 = rand(1, 99);
$sum2_operand2 = rand(1, 99);
$sum2_result = $sum2_operand1 + $sum2_operand2;

$sum3_operand1 = rand(1, 99);
$sum3_operand2 = rand(1, 99);
$sum3_result = $sum3_operand1 + $sum3_operand2;

$sum4_operand1 = rand(1, 99);
$sum4_operand2 = rand(1, 99);
$sum4_result = $sum4_operand1 + $sum4_operand2;


// Inicializamos las variables para la segunda pagina, restas de 1 o 2 digitos
$sub1_operand1 = rand(1, 99);
$sub1_operand2 = rand(1, 99);
if ($sub1_operand1 < $sub1_operand2) {
    list($sub1_operand1, $sub1_operand2) = array($sub1_operand2, $sub1_operand1);
}
$sub1_result = $sub1_operand1 - $sub1_operand2;

$sub2_operand1 = rand(1, 99);
$sub2_operand2 = rand(1, 99);
if ($sub2_operand1 < $sub2_operand2) {
    list($sub2_operand1, $sub2_operand2) = array($sub2_operand2, $sub2_operand1);
}
$sub2_result = $sub2_operand1 - $sub2_operand2;

$sub3_operand1 = rand(1, 99);
$sub3_operand2 = rand(1, 99);
if ($sub3_operand1 < $sub3_operand2) {
    list($sub3_operand1, $sub3_operand2) = array($sub3_operand2, $sub3_operand1);
}
$sub3_result = $sub3_operand1 - $sub3_operand2;

$sub4_operand1 = rand(1, 99);
$sub4_operand2 = rand(1, 99);
if ($sub4_operand1 < $sub4_operand2) {
    list($sub4_operand1, $sub4_operand2) = array($sub4_operand2, $sub4_operand1);
}
$sub4_result = $sub4_operand1 - $sub4_operand2;


// Inicializamos las variables para la tercera pagina, sumas y restas de 2 o 3 digitos
$sum5_operand1 = rand(10, 999);
$sum5_operand2 = rand(10, 999);
$sum5_result = $sum5_operand1 + $sum5_operand2;

$sum6_operand1 = rand(10, 999);
$sum6_operand2 = rand(10, 999);
$sum6_result = $sum6_operand1 + $sum6_operand2;

$sub5_operand1 = rand(10, 999);
$sub5_operand2 = rand(10, 999);
if ($sub5_operand1 < $sub5_operand2) {
    list($sub5_operand1, $sub5_operand2) = array($sub5_operand2, $sub5_operand1);
}
$sub5_result = $sub5_operand1 - $sub5_operand2;

$sub6_operand1 = rand(10, 999);
$sub6_operand2 = rand(10, 999);
if ($sub6_operand1 < $sub6_operand2) {
    list($sub6_operand1, $sub6_operand2) = array($sub6_operand2, $sub6_operand1);
}
$sub6_result = $sub6_operand1 - $sub6_operand2;


// Inicializamos las variables para la cuarta pagina, sumas y restas de 3 o 4 digitos
$sum7_operand1 = rand(100, 9999);
$sum7_operand2 = rand(100, 9999);
$sum7_result = $sum7_operand1 + $sum7_operand2;

$sum8_operand1 = rand(100, 9999);
$sum8_operand2 = rand(100, 9999);
$sum8_result = $sum8_operand1 + $sum8_operand2;

$sub7_operand1 = rand(100, 9999);
$sub7_operand2 = rand(100, 9999);
if ($sub7_operand1 < $sub7_operand2) {
    list($sub7_operand1, $sub7_operand2) = array($sub7_operand2, $sub7_operand1);
}
$sub7_result = $sub7_operand1 - $sub7_operand2;

$sub8_operand1 = rand(100, 9999);
$sub8_operand2 = rand(100, 9999);
if ($sub8_operand1 < $sub8_operand2) {
    list($sub8_operand1, $sub8_operand2) = array($sub8_operand2, $sub8_operand1);
}
$sub8_result = $sub8_operand1 - $sub8_operand2;







// Mensajes para mostrar el resultado
$sum1_message = "";
$sum2_message = "";

$sum3_message = "";
$sum4_message = "";
$sum5_message = "";
$sum6_message = "";
$sum7_message = "";
$sum8_message = "";

$sub1_message = "";
$sub2_message = "";

$sub3_message = "";
$sub4_message = "";
$sub5_message = "";
$sub6_message = "";
$sub7_message = "";
$sub8_message = "";




// Verificamos si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

//pag 1

    // Verificamos si es una suma o una resta y comprobamos las respuestas
    if (isset($_POST['sum1_answer'])) {
        $userSum1Answer = $_POST['sum1_answer'];
        $sum1_operand1 = $_POST['sum1_operand1'];
        $sum1_operand2 = $_POST['sum1_operand2'];
        $sum1_result = $sum1_operand1 + $sum1_operand2;

        if ($userSum1Answer == $sum1_result) {
            $sum1_message = "¡Correcto!";
            $sum1_completed = 1;

            //query para actualizar la base de datos
            $query = "update operaciones set suma1 = '1' where usuario = '$currentUser'";

            $result = mysqli_query($con, $query);

            if(!$result){
                die("Fallo el query");
            }


        } else {
            $sum1_message = "Incorrecto. La respuesta correcta era $sum1_result."; 
        }

        // Generamos una nueva suma para el siguiente intento
        $sum1_operand1 = rand(1, 99);
        $sum1_operand2 = rand(1, 99);
    }    

    if (isset($_POST['sum2_answer'])) {
        $userSum2Answer = $_POST['sum2_answer'];
        $sum2_operand1 = $_POST['sum2_operand1'];
        $sum2_operand2 = $_POST['sum2_operand2'];
        $sum2_result = $sum2_operand1 + $sum2_operand2;

        if ($userSum2Answer == $sum2_result) {
            $sum2_message = "¡Correcto!";
            $sum2_completed = 1;

            //query para actualizar la base de datos
            $query = "update operaciones set suma2 = '1' where usuario = '$currentUser'";

            $result = mysqli_query($con, $query);

            if(!$result){
                die("Fallo el query");
            }
        } else {
            $sum2_message = "Incorrecto. La respuesta correcta era $sum2_result.";
            
        }

        // Generamos una nueva suma para el siguiente intento
        $sum2_operand1 = rand(1, 99);
        $sum2_operand2 = rand(1, 99);
    }

    if (isset($_POST['sum3_answer'])) {
        $userSum3Answer = $_POST['sum3_answer'];
        $sum3_operand1 = $_POST['sum3_operand1'];
        $sum3_operand2 = $_POST['sum3_operand2'];
        $sum3_result = $sum3_operand1 + $sum3_operand2;

        if ($userSum3Answer == $sum3_result) {
            $sum3_message = "¡Correcto!";
            $sum3_completed = 1;

            //query para actualizar la base de datos
            $query = "update operaciones set suma3 = '1' where usuario = '$currentUser'";

            $result = mysqli_query($con, $query);

            if(!$result){
                die("Fallo el query");
            }
        } else {
            $sum3_message = "Incorrecto. La respuesta correcta era $sum3_result.";
            
        }

        // Generamos una nueva suma para el siguiente intento
        $sum3_operand1 = rand(1, 99);
        $sum3_operand2 = rand(1, 99);
    }


    if (isset($_POST['sum4_answer'])) {
        $userSum4Answer = $_POST['sum4_answer'];
        $sum4_operand1 = $_POST['sum4_operand1'];
        $sum4_operand2 = $_POST['sum4_operand2'];
        $sum4_result = $sum4_operand1 + $sum4_operand2;

        if ($userSum4Answer == $sum4_result) {
            $sum4_message = "¡Correcto!";
            $sum4_completed = 1;

            //query para actualizar la base de datos
            $query = "update operaciones set suma4 = '1' where usuario = '$currentUser'";

            $result = mysqli_query($con, $query);

            if(!$result){
                die("Fallo el query");
            }
        } else {
            $sum4_message = "Incorrecto. La respuesta correcta era $sum4_result.";
            
        }

        // Generamos una nueva suma para el siguiente intento
        $sum4_operand1 = rand(1, 99);
        $sum4_operand2 = rand(1, 99);
    }



//pag 2


    if (isset($_POST['sub1_answer'])) {
        $userSub1Answer = $_POST['sub1_answer'];
        $sub1_operand1 = $_POST['sub1_operand1'];
        $sub1_operand2 = $_POST['sub1_operand2'];
        $sub1_result = $sub1_operand1 - $sub1_operand2;

        $pagFlecha = 1;
        $refreshing = 1;

        if ($userSub1Answer == $sub1_result) {
            $sub1_message = "¡Correcto!";
            $sub1_completed = 1;

            //query para actualizar la base de datos
            $query = "update operaciones set resta1 = '1' where usuario = '$currentUser'";

            $result = mysqli_query($con, $query);

            if(!$result){
                die("Fallo el query");
            }
        } else {
            $sub1_message = "Incorrecto. La respuesta correcta era $sub1_result.";
            
        }

        // Generamos una nueva resta para el siguiente intento
        $sub1_operand1 = rand(1, 99);
        $sub1_operand2 = rand(1, 99);
        if ($sub1_operand1 < $sub1_operand2) {
            list($sub1_operand1, $sub1_operand2) = array($sub1_operand2, $sub1_operand1);
        }
    }

    if (isset($_POST['sub2_answer'])) {
        $userSub2Answer = $_POST['sub2_answer'];
        $sub2_operand1 = $_POST['sub2_operand1'];
        $sub2_operand2 = $_POST['sub2_operand2'];
        $sub2_result = $sub2_operand1 - $sub2_operand2;

        $pagFlecha = 1;
        $refreshing = 1;

        if ($userSub2Answer == $sub2_result) {
            $sub2_message = "¡Correcto!";
            $sub2_completed = 1;

            //query para actualizar la base de datos
            $query = "update operaciones set resta2 = '1' where usuario = '$currentUser'";

            $result = mysqli_query($con, $query);

            if(!$result){
                die("Fallo el query");
            }
        } else {
            $sub2_message = "Incorrecto. La respuesta correcta era $sub2_result.";
            
        }

      

        // Generamos una nueva resta para el siguiente intento
        $sub2_operand1 = rand(1, 99);
        $sub2_operand2 = rand(1, 99);
        if ($sub2_operand1 < $sub2_operand2) {
            list($sub2_operand1, $sub2_operand2) = array($sub2_operand2, $sub2_operand1);
        }
    }

    if (isset($_POST['sub3_answer'])) {
        $userSub3Answer = $_POST['sub3_answer'];
        $sub3_operand1 = $_POST['sub3_operand1'];
        $sub3_operand2 = $_POST['sub3_operand2'];
        $sub3_result = $sub3_operand1 - $sub3_operand2;

        $pagFlecha = 1;
        $refreshing = 1;

        if ($userSub3Answer == $sub3_result) {
            $sub3_message = "¡Correcto!";
            $sub3_completed = 1;

            //query para actualizar la base de datos
            $query = "update operaciones set resta3 = '1' where usuario = '$currentUser'";

            $result = mysqli_query($con, $query);

            if(!$result){
                die("Fallo el query");
            }
        } else {
            $sub3_message = "Incorrecto. La respuesta correcta era $sub3_result.";
            
        }

        // Generamos una nueva resta para el siguiente intento
        $sub3_operand1 = rand(1, 99);
        $sub3_operand2 = rand(1, 99);
        if ($sub3_operand1 < $sub3_operand2) {
            list($sub3_operand1, $sub3_operand2) = array($sub3_operand2, $sub3_operand1);
        }
    }

    if (isset($_POST['sub4_answer'])) {
        $userSub4Answer = $_POST['sub4_answer'];
        $sub4_operand1 = $_POST['sub4_operand1'];
        $sub4_operand2 = $_POST['sub4_operand2'];
        $sub4_result = $sub4_operand1 - $sub4_operand2;

        $pagFlecha = 1;
        $refreshing = 1;

        if ($userSub4Answer == $sub4_result) {
            $sub4_message = "¡Correcto!";
            $sub4_completed = 1;

            //query para actualizar la base de datos
            $query = "update operaciones set resta4 = '1' where usuario = '$currentUser'";

            $result = mysqli_query($con, $query);

            if(!$result){
                die("Fallo el query");
            }
        } else {
            $sub4_message = "Incorrecto. La respuesta correcta era $sub4_result.";
            
        }

      

        // Generamos una nueva resta para el siguiente intento
        $sub4_operand1 = rand(1, 99);
        $sub4_operand2 = rand(1, 99);
        if ($sub4_operand1 < $sub4_operand2) {
            list($sub4_operand1, $sub4_operand2) = array($sub4_operand2, $sub4_operand1);
        }
    }

//pag 3

// Verificamos si es una suma o una resta y comprobamos las respuestas
if (isset($_POST['sum5_answer'])) {
    $userSum5Answer = $_POST['sum5_answer'];
    $sum5_operand1 = $_POST['sum5_operand1'];
    $sum5_operand2 = $_POST['sum5_operand2'];
    $sum5_result = $sum5_operand1 + $sum5_operand2;

    $pagFlecha = 2;
    $refreshing = 1;

    if ($userSum5Answer == $sum5_result) {
        $sum5_message = "¡Correcto!";
        $sum5_completed = 1;

        //query para actualizar la base de datos
        $query = "update operaciones set suma5 = '1' where usuario = '$currentUser'";

        $result = mysqli_query($con, $query);

        if(!$result){
            die("Fallo el query");
        }


    } else {
        $sum5_message = "Incorrecto. La respuesta correcta era $sum5_result."; 
    }

    // Generamos una nueva suma para el siguiente intento
    $sum5_operand1 = rand(10, 999);
    $sum5_operand2 = rand(10, 999);
}    

if (isset($_POST['sum6_answer'])) {
    $userSum6Answer = $_POST['sum6_answer'];
    $sum6_operand1 = $_POST['sum6_operand1'];
    $sum6_operand2 = $_POST['sum6_operand2'];
    $sum6_result = $sum6_operand1 + $sum6_operand2;

    $pagFlecha = 2;
    $refreshing = 1;

    if ($userSum6Answer == $sum6_result) {
        $sum6_message = "¡Correcto!";
        $sum6_completed = 1;

        //query para actualizar la base de datos
        $query = "update operaciones set suma6 = '1' where usuario = '$currentUser'";

        $result = mysqli_query($con, $query);

        if(!$result){
            die("Fallo el query");
        }
    } else {
        $sum6_message = "Incorrecto. La respuesta correcta era $sum6_result.";
        
    }

    // Generamos una nueva suma para el siguiente intento
    $sum6_operand1 = rand(10, 999);
    $sum6_operand2 = rand(10, 999);
}

if (isset($_POST['sub5_answer'])) {
    $userSub5Answer = $_POST['sub5_answer'];
    $sub5_operand1 = $_POST['sub5_operand1'];
    $sub5_operand2 = $_POST['sub5_operand2'];
    $sub5_result = $sub5_operand1 - $sub5_operand2;

    $pagFlecha = 2;
    $refreshing = 1;

    if ($userSub5Answer == $sub5_result) {
        $sub5_message = "¡Correcto!";
        $sub5_completed = 1;

        //query para actualizar la base de datos
        $query = "update operaciones set resta5 = '1' where usuario = '$currentUser'";

        $result = mysqli_query($con, $query);

        if(!$result){
            die("Fallo el query");
        }
    } else {
        $sub5_message = "Incorrecto. La respuesta correcta era $sub5_result.";
        
    }

    // Generamos una nueva resta para el siguiente intento
    $sub5_operand1 = rand(10, 999);
    $sub5_operand2 = rand(10, 999);
    if ($sub5_operand1 < $sub5_operand2) {
        list($sub5_operand1, $sub5_operand2) = array($sub5_operand2, $sub5_operand1);
    }
}

if (isset($_POST['sub6_answer'])) {
    $userSub6Answer = $_POST['sub6_answer'];
    $sub6_operand1 = $_POST['sub6_operand1'];
    $sub6_operand2 = $_POST['sub6_operand2'];
    $sub6_result = $sub6_operand1 - $sub6_operand2;

    $pagFlecha = 2;
    $refreshing = 1;

    if ($userSub6Answer == $sub6_result) {
        $sub6_message = "¡Correcto!";
        $sub6_completed = 1;

        //query para actualizar la base de datos
        $query = "update operaciones set resta6 = '1' where usuario = '$currentUser'";

        $result = mysqli_query($con, $query);

        if(!$result){
            die("Fallo el query");
        }
    } else {
        $sub6_message = "Incorrecto. La respuesta correcta era $sub6_result.";
        
    }

  

    // Generamos una nueva resta para el siguiente intento
    $sub6_operand1 = rand(10, 999);
    $sub6_operand2 = rand(10, 999);
    if ($sub6_operand1 < $sub6_operand2) {
        list($sub6_operand1, $sub6_operand2) = array($sub6_operand2, $sub6_operand1);
    }
}

//pag 4

// Verificamos si es una suma o una resta y comprobamos las respuestas
if (isset($_POST['sum7_answer'])) {
    $userSum7Answer = $_POST['sum7_answer'];
    $sum7_operand1 = $_POST['sum7_operand1'];
    $sum7_operand2 = $_POST['sum7_operand2'];
    $sum7_result = $sum7_operand1 + $sum7_operand2;

    $pagFlecha = 3;
    $refreshing = 1;

    if ($userSum7Answer == $sum7_result) {
        $sum7_message = "¡Correcto!";
        $sum7_completed = 1;

        //query para actualizar la base de datos
        $query = "update operaciones set suma7 = '1' where usuario = '$currentUser'";

        $result = mysqli_query($con, $query);

        if(!$result){
            die("Fallo el query");
        }


    } else {
        $sum7_message = "Incorrecto. La respuesta correcta era $sum7_result."; 
    }

    // Generamos una nueva suma para el siguiente intento
    $sum7_operand1 = rand(100, 9999);
    $sum7_operand2 = rand(100, 9999);
}    

if (isset($_POST['sum8_answer'])) {
    $userSum8Answer = $_POST['sum8_answer'];
    $sum8_operand1 = $_POST['sum8_operand1'];
    $sum8_operand2 = $_POST['sum8_operand2'];
    $sum8_result = $sum8_operand1 + $sum8_operand2;

    $pagFlecha = 3;
    $refreshing = 1;

    if ($userSum8Answer == $sum8_result) {
        $sum8_message = "¡Correcto!";
        $sum8_completed = 1;

        //query para actualizar la base de datos
        $query = "update operaciones set suma8 = '1' where usuario = '$currentUser'";

        $result = mysqli_query($con, $query);

        if(!$result){
            die("Fallo el query");
        }
    } else {
        $sum8_message = "Incorrecto. La respuesta correcta era $sum8_result.";
        
    }

    // Generamos una nueva suma para el siguiente intento
    $sum8_operand1 = rand(100, 9999);
    $sum8_operand2 = rand(100, 9999);
}

if (isset($_POST['sub7_answer'])) {
    $userSub7Answer = $_POST['sub7_answer'];
    $sub7_operand1 = $_POST['sub7_operand1'];
    $sub7_operand2 = $_POST['sub7_operand2'];
    $sub7_result = $sub7_operand1 - $sub7_operand2;

    $pagFlecha = 3;
    $refreshing = 1;

    if ($userSub7Answer == $sub7_result) {
        $sub7_message = "¡Correcto!";
        $sub7_completed = 1;

        //query para actualizar la base de datos
        $query = "update operaciones set resta7 = '1' where usuario = '$currentUser'";

        $result = mysqli_query($con, $query);

        if(!$result){
            die("Fallo el query");
        }
    } else {
        $sub7_message = "Incorrecto. La respuesta correcta era $sub7_result.";
        
    }

    // Generamos una nueva resta para el siguiente intento
    $sub7_operand1 = rand(100, 9999);
    $sub7_operand2 = rand(100, 9999);
    if ($sub7_operand1 < $sub7_operand2) {
        list($sub7_operand1, $sub7_operand2) = array($sub7_operand2, $sub7_operand1);
    }
}

if (isset($_POST['sub8_answer'])) {
    $userSub8Answer = $_POST['sub8_answer'];
    $sub8_operand1 = $_POST['sub8_operand1'];
    $sub8_operand2 = $_POST['sub8_operand2'];
    $sub8_result = $sub8_operand1 - $sub8_operand2;

    $pagFlecha = 3;
    $refreshing = 1;

    if ($userSub8Answer == $sub8_result) {
        $sub8_message = "¡Correcto!";
        $sub8_completed = 1;

        //query para actualizar la base de datos
        $query = "update operaciones set resta8 = '1' where usuario = '$currentUser'";

        $result = mysqli_query($con, $query);

        if(!$result){
            die("Fallo el query");
        }
    } else {
        $sub8_message = "Incorrecto. La respuesta correcta era $sub8_result.";
        
    }

  

    // Generamos una nueva resta para el siguiente intento
    $sub8_operand1 = rand(100, 9999);
    $sub8_operand2 = rand(100, 9999);
    if ($sub8_operand1 < $sub8_operand2) {
        list($sub8_operand1, $sub8_operand2) = array($sub8_operand2, $sub8_operand1);
    }
}

}



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica de Sumas y Restas</title>
    <link rel="stylesheet" href="css/suma.css">
    <!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/3d75464da1.js" crossorigin="anonymous"></script>
</head>
<body>
    <script>
        function logout(){
            var res = confirm("Estás seguro que quieres salir?")
            return res
        }
    </script>
    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="suma.php">
                <img src="images\logo.png" width="50" height="80" class="d-inline-block align-top" alt="">
            </a>
            <div class="ml-auto">
                <a onclick="return logout()" href="logout.php" class="btn btn-small btn-danger"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
            
        </div>
    </nav>


    <?php
//logica para las flechas, usa una variable poder elegir en que pagina esta
if (!isset($_POST['flecha']) && $refreshing == 0) {
    $pagFlecha = 0;
} else if ($refreshing == 1){
$refreshing == 0;
}
else{
    $pagFlecha = (int)$_POST['flecha'];

    if (isset($_POST['decrease'])) {
        $pagFlecha = max(0, $pagFlecha - 1); // decrementa pero solo hasta 0
    } elseif (isset($_POST['increase'])) {
        $pagFlecha = min(3, $pagFlecha + 1); // incrementa, pero solo hasta 3
    }
}
?>


<div class="container">

<?php if ($pagFlecha == 0): ?>
    <!-- Sección de sumas -->
    <div class="exercise-container">
        <div class="exercise">
            <?php if ($sum1_completed == 1): ?>
                <h2>Ejercicio de Sumas - Fácil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                <h2>Ejercicio de Sumas - Fácil</h2>
                
                <form method="post" action="">
                    <div class="problem">
                        <p>¿Cuánto es <?php echo $sum1_operand1; ?> + <?php echo $sum1_operand2; ?>?</p>
                        <input type="hidden" name="sum1_operand1" value="<?php echo $sum1_operand1; ?>">
                        <input type="hidden" name="sum1_operand2" value="<?php echo $sum1_operand2; ?>">
                        <input type="number" name="sum1_answer" required>
                    </div>
                    <button type="submit" name="submit_sum1">Verificar Suma 1</button>
                    <div class="message">
                        <p><?php echo $sum1_message; ?></p>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        <div class="exercise">
            <?php if ($sum2_completed == 1): ?>
                <h2>Ejercicio de Sumas - Fácil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                <h2>Ejercicio de Sumas - Fácil</h2>
                
                <form method="post" action="">
                    <div class="problem">
                        <p>¿Cuánto es <?php echo $sum2_operand1; ?> + <?php echo $sum2_operand2; ?>?</p>
                        <input type="hidden" name="sum2_operand1" value="<?php echo $sum2_operand1; ?>">
                        <input type="hidden" name="sum2_operand2" value="<?php echo $sum2_operand2; ?>">
                        <input type="number" name="sum2_answer" required>
                    </div>
                    <button type="submit" name="submit_sum2">Verificar Suma 2</button>
                    <div class="message">
                        <p><?php echo $sum2_message; ?></p>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        
        
       
            </div> <!-- aqui termina excersise container -->

            <div class="exercise-container">
        <div class="exercise">
            <?php if ($sum3_completed == 1): ?>
                <h2>Ejercicio de Sumas - Fácil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                <h2>Ejercicio de Sumas - Fácil</h2>
                
                <form method="post" action="">
                    <div class="problem">
                        <p>¿Cuánto es <?php echo $sum3_operand1; ?> + <?php echo $sum3_operand2; ?>?</p>
                        <input type="hidden" name="sum3_operand1" value="<?php echo $sum3_operand1; ?>">
                        <input type="hidden" name="sum3_operand2" value="<?php echo $sum3_operand2; ?>">
                        <input type="number" name="sum3_answer" required>
                    </div>
                    <button type="submit" name="submit_sum3">Verificar Suma 3</button>
                    <div class="message">
                        <p><?php echo $sum3_message; ?></p>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        <div class="exercise">
            <?php if ($sum4_completed == 1): ?>
                <h2>Ejercicio de Sumas - Fácil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                <h2>Ejercicio de Sumas - Fácil</h2>
                
                <form method="post" action="">
                    <div class="problem">
                        <p>¿Cuánto es <?php echo $sum4_operand1; ?> + <?php echo $sum4_operand2; ?>?</p>
                        <input type="hidden" name="sum4_operand1" value="<?php echo $sum4_operand1; ?>">
                        <input type="hidden" name="sum4_operand2" value="<?php echo $sum4_operand2; ?>">
                        <input type="number" name="sum4_answer" required>
                    </div>
                    <button type="submit" name="submit_sum4">Verificar Suma 4</button>
                    <div class="message">
                        <p><?php echo $sum4_message; ?></p>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        
        
       
            </div> <!-- aqui termina excersise container -->




            <?php endif; ?>


            <?php if ($pagFlecha == 1): ?>            
            <!-- Sección de restas -->
            <div class="exercise-container">
                <div class="exercise">
                <?php if ($sub1_completed == 1): ?>
                <h2>Ejercicio de Restas - Fácil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                    <h2>Ejercicio de Restas - Fácil</h2>
                    
                    <form method="post" action="">
                        <div class="problem">
                            <p>¿Cuánto es <?php echo $sub1_operand1; ?> - <?php echo $sub1_operand2; ?>?</p>
                            <input type="hidden" name="sub1_operand1" value="<?php echo $sub1_operand1; ?>">
                            <input type="hidden" name="sub1_operand2" value="<?php echo $sub1_operand2; ?>">
                            <input type="number" name="sub1_answer" required>
                        </div>
                        <button type="submit" name="submit_sub1">Verificar Resta 1</button>
                        <div class="message">
                            <p><?php echo $sub1_message; ?></p>
                        </div>
                    </form>


                    
                    <?php endif; ?>
                </div>
                
                <div class="exercise">
                <?php if ($sub2_completed == 1): ?>
                <h2>Ejercicio de Restas - Fácil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                    <h2>Ejercicio de Restas - Fácil</h2>
                    
                    <form method="post" action="">
                        <div class="problem">
                            <p>¿Cuánto es <?php echo $sub2_operand1; ?> - <?php echo $sub2_operand2; ?>?</p>
                            <input type="hidden" name="sub2_operand1" value="<?php echo $sub2_operand1; ?>">
                            <input type="hidden" name="sub2_operand2" value="<?php echo $sub2_operand2; ?>">
                            <input type="number" name="sub2_answer" required>
                        </div>
                        <button type="submit" name="submit_sub2">Verificar Resta 2</button>
                        <div class="message">
                            <p><?php echo $sub2_message; ?></p>
                        </div>
                    </form>


                    
                    <?php endif; ?>
                </div>
  
        </div><!-- aqui termina excersise container -->

        <div class="exercise-container">
                <div class="exercise">
                <?php if ($sub3_completed == 1): ?>
                <h2>Ejercicio de Restas - Fácil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                    <h2>Ejercicio de Restas - Fácil</h2>
                    
                    <form method="post" action="">
                        <div class="problem">
                            <p>¿Cuánto es <?php echo $sub3_operand1; ?> - <?php echo $sub3_operand2; ?>?</p>
                            <input type="hidden" name="sub3_operand1" value="<?php echo $sub3_operand1; ?>">
                            <input type="hidden" name="sub3_operand2" value="<?php echo $sub3_operand2; ?>">
                            <input type="number" name="sub3_answer" required>
                        </div>
                        <button type="submit" name="submit_sub3">Verificar Resta 3</button>
                        <div class="message">
                            <p><?php echo $sub3_message; ?></p>
                        </div>
                    </form>


                    
                    <?php endif; ?>
                </div>
                
                <div class="exercise">
                <?php if ($sub4_completed == 1): ?>
                <h2>Ejercicio de Restas - Fácil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                    <h2>Ejercicio de Restas - Fácil</h2>
                    
                    <form method="post" action="">
                        <div class="problem">
                            <p>¿Cuánto es <?php echo $sub4_operand1; ?> - <?php echo $sub4_operand2; ?>?</p>
                            <input type="hidden" name="sub4_operand1" value="<?php echo $sub4_operand1; ?>">
                            <input type="hidden" name="sub4_operand2" value="<?php echo $sub4_operand2; ?>">
                            <input type="number" name="sub4_answer" required>
                        </div>
                        <button type="submit" name="submit_sub4">Verificar Resta 4</button>
                        <div class="message">
                            <p><?php echo $sub4_message; ?></p>
                        </div>
                    </form>


                    
                    <?php endif; ?>
                </div>
  
        </div><!-- aqui termina excersise container -->


        <?php endif; ?>




        <?php if ($pagFlecha == 2): ?>
    <!-- Sección de sumas y restas, pag 3 -->
    <div class="exercise-container">
        <div class="exercise">
            <?php if ($sum5_completed == 1): ?>
                <h2>Ejercicio de Sumas - Normal</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                <h2>Ejercicio de Sumas - Normal</h2>
                
                <form method="post" action="">
                    <div class="problem">
                        <p>¿Cuánto es <?php echo $sum5_operand1; ?> + <?php echo $sum5_operand2; ?>?</p>
                        <input type="hidden" name="sum5_operand1" value="<?php echo $sum5_operand1; ?>">
                        <input type="hidden" name="sum5_operand2" value="<?php echo $sum5_operand2; ?>">
                        <input type="number" name="sum5_answer" required>
                    </div>
                    <button type="submit" name="submit_sum5">Verificar Suma 5</button>
                    <div class="message">
                        <p><?php echo $sum5_message; ?></p>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        <div class="exercise">
            <?php if ($sum6_completed == 1): ?>
                <h2>Ejercicio de Sumas - Normal</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                <h2>Ejercicio de Sumas - Normal</h2>
                
                <form method="post" action="">
                    <div class="problem">
                        <p>¿Cuánto es <?php echo $sum6_operand1; ?> + <?php echo $sum6_operand2; ?>?</p>
                        <input type="hidden" name="sum6_operand1" value="<?php echo $sum6_operand1; ?>">
                        <input type="hidden" name="sum6_operand2" value="<?php echo $sum6_operand2; ?>">
                        <input type="number" name="sum6_answer" required>
                    </div>
                    <button type="submit" name="submit_sum6">Verificar Suma 6</button>
                    <div class="message">
                        <p><?php echo $sum6_message; ?></p>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        
        
       
            </div> <!-- aqui termina excersise container -->

            <div class="exercise-container">
                <div class="exercise">
                <?php if ($sub5_completed == 1): ?>
                <h2>Ejercicio de Restas - Normal</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                    <h2>Ejercicio de Restas - Normal</h2>
                    
                    <form method="post" action="">
                        <div class="problem">
                            <p>¿Cuánto es <?php echo $sub5_operand1; ?> - <?php echo $sub5_operand2; ?>?</p>
                            <input type="hidden" name="sub5_operand1" value="<?php echo $sub5_operand1; ?>">
                            <input type="hidden" name="sub5_operand2" value="<?php echo $sub5_operand2; ?>">
                            <input type="number" name="sub5_answer" required>
                        </div>
                        <button type="submit" name="submit_sub5">Verificar Resta 5</button>
                        <div class="message">
                            <p><?php echo $sub5_message; ?></p>
                        </div>
                    </form>


                    
                    <?php endif; ?>
                </div>
                
                <div class="exercise">
                <?php if ($sub6_completed == 1): ?>
                <h2>Ejercicio de Restas - Normal</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                    <h2>Ejercicio de Restas - Normal</h2>
                    
                    <form method="post" action="">
                        <div class="problem">
                            <p>¿Cuánto es <?php echo $sub6_operand1; ?> - <?php echo $sub6_operand2; ?>?</p>
                            <input type="hidden" name="sub6_operand1" value="<?php echo $sub6_operand1; ?>">
                            <input type="hidden" name="sub6_operand2" value="<?php echo $sub6_operand2; ?>">
                            <input type="number" name="sub6_answer" required>
                        </div>
                        <button type="submit" name="submit_sub6">Verificar Resta 6</button>
                        <div class="message">
                            <p><?php echo $sub6_message; ?></p>
                        </div>
                    </form>


                    
                    <?php endif; ?>
                </div>
  
        </div><!-- aqui termina excersise container -->




            <?php endif; ?>


            <?php if ($pagFlecha == 3): ?>
    <!-- Sección de sumas y restas, pag 4 -->
    <div class="exercise-container">
        <div class="exercise">
            <?php if ($sum7_completed == 1): ?>
                <h2>Ejercicio de Sumas - Difícil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                <h2>Ejercicio de Sumas - Difícil</h2>
                
                <form method="post" action="">
                    <div class="problem">
                        <p>¿Cuánto es <?php echo $sum7_operand1; ?> + <?php echo $sum7_operand2; ?>?</p>
                        <input type="hidden" name="sum7_operand1" value="<?php echo $sum7_operand1; ?>">
                        <input type="hidden" name="sum7_operand2" value="<?php echo $sum7_operand2; ?>">
                        <input type="number" name="sum7_answer" required>
                    </div>
                    <button type="submit" name="submit_sum7">Verificar Suma 7</button>
                    <div class="message">
                        <p><?php echo $sum7_message; ?></p>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        <div class="exercise">
            <?php if ($sum8_completed == 1): ?>
                <h2>Ejercicio de Sumas - Difícil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                <h2>Ejercicio de Sumas - Difícil</h2>
                
                <form method="post" action="">
                    <div class="problem">
                        <p>¿Cuánto es <?php echo $sum8_operand1; ?> + <?php echo $sum8_operand2; ?>?</p>
                        <input type="hidden" name="sum8_operand1" value="<?php echo $sum8_operand1; ?>">
                        <input type="hidden" name="sum8_operand2" value="<?php echo $sum8_operand2; ?>">
                        <input type="number" name="sum8_answer" required>
                    </div>
                    <button type="submit" name="submit_sum8">Verificar Suma 8</button>
                    <div class="message">
                        <p><?php echo $sum8_message; ?></p>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        
        
       
            </div> <!-- aqui termina excersise container -->

            <div class="exercise-container">
                <div class="exercise">
                <?php if ($sub7_completed == 1): ?>
                <h2>Ejercicio de Restas - Difícil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                    <h2>Ejercicio de Restas - Difícil</h2>
                    
                    <form method="post" action="">
                        <div class="problem">
                            <p>¿Cuánto es <?php echo $sub7_operand1; ?> - <?php echo $sub7_operand2; ?>?</p>
                            <input type="hidden" name="sub7_operand1" value="<?php echo $sub7_operand1; ?>">
                            <input type="hidden" name="sub7_operand2" value="<?php echo $sub7_operand2; ?>">
                            <input type="number" name="sub7_answer" required>
                        </div>
                        <button type="submit" name="submit_sub7">Verificar Resta 7</button>
                        <div class="message">
                            <p><?php echo $sub7_message; ?></p>
                        </div>
                    </form>


                    
                    <?php endif; ?>
                </div>
                
                <div class="exercise">
                <?php if ($sub8_completed == 1): ?>
                <h2>Ejercicio de Restas - Difícil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
            <?php else: ?>
                    <h2>Ejercicio de Restas - Difícil</h2>
                    
                    <form method="post" action="">
                        <div class="problem">
                            <p>¿Cuánto es <?php echo $sub8_operand1; ?> - <?php echo $sub8_operand2; ?>?</p>
                            <input type="hidden" name="sub8_operand1" value="<?php echo $sub8_operand1; ?>">
                            <input type="hidden" name="sub8_operand2" value="<?php echo $sub8_operand2; ?>">
                            <input type="number" name="sub8_answer" required>
                        </div>
                        <button type="submit" name="submit_sub8">Verificar Resta 8</button>
                        <div class="message">
                            <p><?php echo $sub8_message; ?></p>
                        </div>
                    </form>


                    
                    <?php endif; ?>
                </div>
  
        </div><!-- aqui termina excersise container -->




            <?php endif; ?>


    </div><!-- aqui termina el contenedor de todo -->




    <div class="container-sm container-flechas">
        <div class="row">
            <div class="col-auto left">
                <form method="post" action="">
                    <input type="hidden" name="flecha" value="<?php echo $pagFlecha; ?>">
                    <button type="submit" name="decrease" class="btn btn-success"><i class="fa-solid fa-arrow-left-long"></i></button>
                </form>
            </div>
            <div class="col-auto ml-auto right">
                <form method="post" action="">
                    <input type="hidden" name="flecha" value="<?php echo $pagFlecha; ?>">
                    <button type="submit" name="increase" class="btn btn-success"><i class="fa-solid fa-arrow-right-long"></i></button>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
