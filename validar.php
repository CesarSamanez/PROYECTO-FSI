<?php
include("conexion.php");

$correo = $_POST['email'];
$clave = $_POST['password'];

$sql = "SELECT *FROM usuario WHERE correo='$correo' and clave='$clave'";
$query = mysqli_query($conexion, $sql);

$filas = mysqli_num_rows($query);

if($filas > 0){
    echo "<script>
        alert('Inicio de sesion exitoso');
        </script>
    ";
}else{ 
    echo "<script>
        alert('Correo o clave incorrecta');
        alert($correo);
        alert($clave);
        window.location = 'login.html';
        </script>
    ";
}
?>