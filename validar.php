<?php

include("conexion.php");
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT *FROM usuario WHERE correo='$email' AND clave='$password'";
$query = mysqli_query($conexion, $sql);

$filas = mysqli_num_rows($query);

if($filas > 0){
    echo "window.location='index.html';";
}else{ 
    echo "Sesion invalida";
}

?>