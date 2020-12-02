<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
session_start();

if (empty($_SESSION)) {
    echo "<script>";
    echo "alert('Debe iniciar sesión');";
    echo "window.location = 'index.html';";
    echo "</script>";
} else {
    if ($_SESSION["estado"] == 0) {
        echo "<script>";
        echo "alert('Su cuenta ha sido deshabilitada, contactese con el administrador.');";
        echo "window.location = 'index.html';";
        echo "</script>";
    }
}
