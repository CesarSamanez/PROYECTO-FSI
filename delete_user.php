<?php
require 'validarCliente.php';
include("conexion.php");

$codigo = $_GET['codigo'];
?>

<head>
    <script type="text/javascript">
        var answer = window.confirm("¿Eliminar registro?");
        if (answer) {
            <?php

            $sql = "DELETE FROM usuario WHERE codigo=$codigo";

            if ($conn->query($sql) === TRUE) {
                echo "<script>";
                echo "window.location = 'administration.php';";
                echo "</script>";
            } else {
                echo "<script>";
                echo "alert('Error - No se pudo guardar el registro.');";
                echo "window.location = 'administration.php';";
                echo "</script>";
            }
            ?>
        } else {
            window.location = 'administration.php';
        }
    </script>

</head>
<?php
$conn->close();
?>