<head>
    <meta charset="utf-8">
</head>
<?php
include("conexion.php");

header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

$correo = $_POST['email'];
$clave = $_POST['password'];

$sql = "SELECT *FROM usuario WHERE correo='$correo' and clave='$clave'";
$query = mysqli_query($conexion, $sql);

$filas = mysqli_num_rows($query);

if ($filas > 0) {
    session_start();
    while ($values = $query->fetch_assoc()) {
        $_SESSION["codigo"] = $values["codigo"];
        $_SESSION["nombres"] = $values["nombres"];
        $_SESSION["apellidos"] = $values["apellidos"];
        $_SESSION["celular"] = $values["celular"];
        $_SESSION["correo"] = $values["correo"];
        $_SESSION["rol"] = $values["rol"];
        $_SESSION['estado'] = $values["estado"];

        if ($_SESSION["rol"] == 1) {
            header('Location: administration.php');
        } else {
            header('Location: index.html');
        }
    }
} else {
    echo "<script>
        alert('Correo o clave incorrecta');
        window.location = 'login.html';
        </script>
    ";
}

mysqli_free_result($query);
mysqli_close($conexion);
?>