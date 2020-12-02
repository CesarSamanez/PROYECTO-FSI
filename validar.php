<?php

include("conexion.php");
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT *FROM usuario WHERE correo='$email' AND clave='$password'";
$query = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
$activo = $row['estado'];

$count = mysqli_num_rows($query);

if($count == 1){
    header("Location: www.google.com");
}else{
    echo "Sesion invalida";
}


?>