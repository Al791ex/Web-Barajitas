<?php

    $db_host = "sumas-restas.mysql.database.azure.com";
    $db_user = "al791ex08";
    $db_pass = "Richard%";
    $db_name = "sumas_db";



/*
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "sumas_db";
*/

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_errno()){
        echo 'No se pudo conectar a la DB: '. mysqli_connect_error();
    }