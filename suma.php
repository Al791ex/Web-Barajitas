<?php 
include ("controller/conexion.php");

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

$currentUser = $_SESSION['usuario'];

try {
    $query = "select * from operaciones where id = '$currentUser'";
    $result = mysqli_query($con, $query);
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger">Debes estar logeado para hacer esta operacion: ' . $e->getMessage() . '</div>';
}

if(!$result){       
    die("Fallo el query");
    
}

$row = mysqli_fetch_assoc($result);


$sum1_completed = $row['suma1'];
$sum2_completed = $row['suma2'];
$sub1_completed = $ro0w['resta1'];
$sub2_completed = $row['resta2'];

// Inicializamos las variables para las sumas de dificultad baja
$sum1_operand1 = rand(1, 10);
$sum1_operand2 = rand(1, 10);
$sum1_result = $sum1_operand1 + $sum1_operand2;
//$sum1_score = isset($_COOKIE['sum1_score']) ? $_COOKIE['sum1_score'] : 0;

// Inicializamos las variables para las sumas de dificultad alta
$sum2_operand1 = rand(100, 500);
$sum2_operand2 = rand(100, 500);
$sum2_result = $sum2_operand1 + $sum2_operand2;
//$sum2_score = isset($_COOKIE['sum2_score']) ? $_COOKIE['sum2_score'] : 0;

// Inicializamos las variables para las restas de dificultad baja
$sub1_operand1 = rand(1, 10);
$sub1_operand2 = rand(1, 10);
if ($sub1_operand1 < $sub1_operand2) {
    list($sub1_operand1, $sub1_operand2) = array($sub1_operand2, $sub1_operand1);
}
$sub1_result = $sub1_operand1 - $sub1_operand2;
//$sub1_score = isset($_COOKIE['sub1_score']) ? $_COOKIE['sub1_score'] : 0;

// Inicializamos las variables para las restas de dificultad alta
$sub2_operand1 = rand(100, 500);
$sub2_operand2 = rand(100, 500);
if ($sub2_operand1 < $sub2_operand2) {
    list($sub2_operand1, $sub2_operand2) = array($sub2_operand2, $sub2_operand1);
}
$sub2_result = $sub2_operand1 - $sub2_operand2;
//$sub2_score = isset($_COOKIE['sub2_score']) ? $_COOKIE['sub2_score'] : 0;

// Mensajes para mostrar el resultado
$sum1_message = "";
$sum2_message = "";
$sub1_message = "";
$sub2_message = "";

// Verificamos si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $sum1_operand1 = rand(1, 10);
        $sum1_operand2 = rand(1, 10);
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
        $sum2_operand1 = rand(100, 500);
        $sum2_operand2 = rand(100, 500);
    }

    if (isset($_POST['sub1_answer'])) {
        $userSub1Answer = $_POST['sub1_answer'];
        $sub1_operand1 = $_POST['sub1_operand1'];
        $sub1_operand2 = $_POST['sub1_operand2'];
        $sub1_result = $sub1_operand1 - $sub1_operand2;

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
        $sub1_operand1 = rand(1, 10);
        $sub1_operand2 = rand(1, 10);
        if ($sub1_operand1 < $sub1_operand2) {
            list($sub1_operand1, $sub1_operand2) = array($sub1_operand2, $sub1_operand1);
        }
    }

    if (isset($_POST['sub2_answer'])) {
        $userSub2Answer = $_POST['sub2_answer'];
        $sub2_operand1 = $_POST['sub2_operand1'];
        $sub2_operand2 = $_POST['sub2_operand2'];
        $sub2_result = $sub2_operand1 - $sub2_operand2;

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
        $sub2_operand1 = rand(100, 500);
        $sub2_operand2 = rand(100, 500);
        if ($sub2_operand1 < $sub2_operand2) {
            list($sub2_operand1, $sub2_operand2) = array($sub2_operand2, $sub2_operand1);
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

<div class="container">
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
                <h2>Ejercicio de Sumas - Dificil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>

            <?php elseif ($sum1_completed == 0): ?> 
                <h2>Ejercicio de Sumas - Dificil</h2>
                <div class="message">
                    <p>Completa el ejercicio Fácil para poder realizar este</p>
                </div>  

            <?php else: ?>
                    <h2>Ejercicio de Sumas - Difícil</h2>
                    
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
            </div>

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
                <h2>Ejercicio de Restas - Dificil</h2>
                <div class="message">
                    <p>¡Ya has completado este ejercicio con éxito!</p>
                </div>
                <?php elseif ($sub1_completed == 0): ?> 
                <h2>Ejercicio de Restas - Dificil</h2>
                <div class="message">
                    <p>Completa el ejercicio Fácil para poder realizar este</p>
            </div>  
            <?php else: ?>
                <h2>Ejercicio de Restas - Difícil</h2>
            
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
        </div>
    </div>
    <div class="container-sm container-flechas">
        <div class="row">
            <div class="col-auto left">
                <a href="#" class="btn btn-success"><i class="fa-solid fa-arrow-left-long"></i></a>
            </div>
            <div class="col-auto ml-auto right">
                <a href="#" class="btn btn-success"><i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
</body>
</html>
