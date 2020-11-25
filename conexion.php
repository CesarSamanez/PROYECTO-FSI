<?php

function conectar(){

    $user = "root";
    $pass = "";
    $server = "localhost";
    $db = "fsi";
    $con = mysqli_connect($server, $user, $pass) or die ("Error en conectar".mysqli_error);

    mysqli_select_db($con, $db);

    return $con;
}


?>

