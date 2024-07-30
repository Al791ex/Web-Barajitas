<?php

    $db_host = "localhost";
    $db_user = "gp3_root";
    $db_pass = 'v4$L0Yk2l4';
    $db_name = 'gp3_sumas_db';

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_errno()){
        echo 'No se pudo conectar a la DB: '. mysqli_connect_error();
    }