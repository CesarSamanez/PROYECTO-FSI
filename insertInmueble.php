<head>
    <script type="text/javascript">
        history.forward();
    </script>

    <?php require 'validarCliente.php'; ?>
</head>

<?php
include("conexion.php");

$tipo_inmueble = $_POST['tipo_inmueble'];
$descripcion = $_POST['descripcion'];

$sql = "INSERT INTO tipo_inmueble (nombre, descripcion) VALUES('$tipo_inmueble', '$descripcion')";
$query = mysqli_query($conexion, $sql);
/*
if ($query) {
    echo "<script> alert('Registro exitoso Tipo Inmueble');    
    </script>";
} else {
    echo "<script> alert('No se pudo realizar el registro TipoInmueble'); 
  
    </script>";
}
*/
$codigoTipoInmueble = $conexion->insert_id;

$direccion = $_POST['direccion'];
$departamento = $_POST['departamento'];
$provincia = $_POST['provincia'];
$distrito = $_POST['distrito'];

$sql = "INSERT INTO ubicacion (direccion, distrito, provincia, departamento) VALUES('$direccion', '$distrito', '$provincia', '$departamento')";
$query = mysqli_query($conexion, $sql);
/*
if ($query) {
    echo "<script> alert('Registro exitoso Ubicacion');    
    </script>";
} else {
    echo "<script> alert('No se pudo realizar el registro Ubicacion'); 
   
    </script>";
}*/

$codigoUbicacion = $conexion->insert_id;


$ancho = $_POST['ancho'];
$largo = $_POST['largo'];
$area = $_POST['area'];
$precio = $_POST['precio'];
$moneda = $_POST['moneda'];
$otros_detalles = $_POST['otros_detalles'];
$aforo = $_POST['aforo'];


$revisar = getimagesize($_FILES["foto"]["tmp_name"]);
if ($revisar !== false) {
    $image = $_FILES['foto']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($image));


    $sql = "INSERT INTO inmueble_detalles (ancho, largo, area, precio, moneda, otros_detalles, aforo, foto) VALUES('$ancho','$largo','$area','$precio','$moneda','$otros_detalles','$aforo','$imgContenido')";
    $query = mysqli_query($conexion, $sql);
/*
    if ($query) {
        echo "<script> alert('Registro exitoso inmueble_detalles');    
    </script>";
    } else {
        echo "Error: " . $sql . "->" . $conexion->error;
        echo "<script> alert('No se pudo realizar el registro inmueble_Detalles');  
    </script>";
    }*/
}
$codigoInmuebleDetalles = $conexion->insert_id;

$usuario = $_SESSION['codigo'];

$sql = "INSERT INTO inmueble (tipo_inmueble, ubicacion, inmueble_detalles, contacto) VALUES('$codigoTipoInmueble','$codigoUbicacion','$codigoInmuebleDetalles','$usuario')";
$query = mysqli_query($conexion, $sql);

if ($query) {
    echo "<script> alert('Registro exitoso.');  
    window.location = 'anuncios.php';  
    </script>";
} else {
    echo "<script> alert('No se pudo realizar el registro Inmueble');   
    window.location = 'index.php';  
    </script>";
}
