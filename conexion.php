<?php

    $user = "test";
    $pass = "EkMGdb5c";
    $server = "localhost";
    $db = "proyecto_fsi";
    
    $conexion = new mysqli($server, $user, $pass, $db);

    if($conexion->connect_errno){
        die("La conexion ha fallado" . $conexion->connect_errno);
    }
    
?>

