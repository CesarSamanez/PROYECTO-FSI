<?php
include("conexion.php");

$correo = $_POST['email'];
$clave = $_POST['password'];

$sql = "SELECT *FROM usuario WHERE correo='$correo' and clave='$clave'";
$query = mysqli_query($conexion, $sql);

$filas = mysqli_num_rows($query);

if($filas > 0){
    echo "<script>
    window.location = 'index.html';
    </script>
    ";
}else{ 
    echo "$correo";
    echo "$clave";

    echo "<script>
        alert('Correo o clave incorrecta');
        window.location = 'login.html';
        </script>
    ";
}
?>