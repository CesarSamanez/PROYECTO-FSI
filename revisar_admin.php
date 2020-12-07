<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
session_start();
if(empty($_SESSION)){
  echo "<script>";
  echo "alert('Debe iniciar sesión');";
  echo "window.location = 'login.php';";
  echo "</script>";
}else{
  if($_SESSION["rol"]!=1){
    echo "<script>";
    echo "alert('No tiene los permisos necesarios para el acceso');";
    echo "window.location = 'index.html';";
    echo "</script>";
  }
}
?>
