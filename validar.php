<?php

include("conexion.php");
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT *FROM usuario WHERE correo='$email' AND clave='$password'";
$query = mysqli_query($conexion, $sql);

if($count = $query->num_rows > 0){
    header("Location: www.google.com");
}else{
    echo "Sesion invalida";
}


?>