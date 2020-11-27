<?php

function conectar(){

    $user = "test";
    $pass = "EkMGdb5c";
    $server = "localhost";
    $db = "proyecto_fsi";
    $con = mysqli_connect($server, $user, $pass) or die ("Error en conectar".mysqli_error);

    mysqli_select_db($con, $db);

    return $con;
}


?>

