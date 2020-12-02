<?php
require 'validarCliente.php';
include("conexion.php");

$codigo = $_GET['codigo'];

$sql = "DELETE FROM usuario WHERE codigo=$codigo";

if ($conexion->query($sql) === TRUE) {
    echo "<script>";
    echo "window.location = 'administration.php';";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Error - No se pudo eliminar el registro.');";
    echo "window.location = 'administration.php';";
    echo "</script>";
}

$conexion->close();
?>