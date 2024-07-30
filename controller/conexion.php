<?php

    $db_host = "grupo3.devcorezulia.lat";
    $db_user = "gp3_Al791ex08";
    $db_pass = 'v4$L0Yk2l4';
    $db_name = 'gp3_sumas_db';

    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_errno()){
        echo 'No se pudo conectar a la DB: '. mysqli_connect_error();
    }