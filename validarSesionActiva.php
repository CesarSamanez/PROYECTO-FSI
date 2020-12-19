<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
session_start();

if (!empty($_SESSION)) {
    echo "<script>";
    echo "alert('Advertencia: Existe una sesión iniciada.');";
    echo "window.location = 'index.php';";
    echo "</script>";
}
