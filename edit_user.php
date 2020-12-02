<?php

require 'validarCliente.php';
include("conexion.php");

$codigo = $_SESSION['codigo'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$genero = $_POST['genero'];
$dni = $_POST['dni'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];

$sql = "UPDATE usuario SET nombres='$nombres', apellidos='$apellidos', genero='$genero', dni='$dni', celular='$celular', correo='$correo', clave='$clave', rol='$rol', estado='$estado' WHERE codigo=$codigo";

if ($conexion->query($sql) === TRUE) {
        echo "<script>";
        echo "alert('Datos modificados exitosamente');";
        echo "window.location = 'administration.php';";
        echo "</script>";

} else {
        echo "<script>";
        echo "alert('Error - No se pudo editar el registro.');";
        echo "window.location = 'administration.php';";
        echo "</script>";
}


$conexion->close();
