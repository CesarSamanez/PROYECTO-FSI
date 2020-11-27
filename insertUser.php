<?php

include("conexion.php");

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$genero = $_POST['genero'];
$dni = $_POST['dni'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];

$sql = "INSERT INTO usuario (nombres, apellidos, genero, dni, celular, correo, clave) VALUES('$nombres', '$apellidos', '$genero', '$dni', '$celular', '$correo', '$clave')";
$query = mysqli_query($conexion, $sql);

if($query){
    echo "<script> alert('Registro exitoso');
    location.href = '../index.html';      
    </script>";
}else{
    echo "<script> alert('No se pudo realizar el registro'); 
    location.href = '../index.html';     
    </script>";
}

?>