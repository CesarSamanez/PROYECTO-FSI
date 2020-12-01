<?php
include("conexion.php");

$tipo_inmueble = $_POST['tipo_inmueble'];
$descripcion = $_POST['descripcion'];

$sql = "INSERT INTO tipo_inmueble (nombre, descripcion) VALUES('$tipo_inmueble', '$descripcion')";
$query = mysqli_query($conexion, $sql);

if($query){
    echo "<script> alert('Registro exitoso Tipo Inmueble');    
    </script>";
}else{
    echo "<script> alert('No se pudo realizar el registro TipoInmueble'); 
    location.href = 'addcommercial.php';     
    </script>";
}

$codigoTipoInmueble = $conexion->insert_id;



$direccion = $_POST['direccion'];
$departamento = $_POST['departamento'];
$provincia = $_POST['provincia'];
$distrito = $_POST['distrito'];

$sql = "INSERT INTO ubicacion (direccion, distrito, provincia, departamento) VALUES('$direccion', '$distrito', '$provincia', '$departamento')";
$query = mysqli_query($conexion, $sql);

if($query){
    echo "<script> alert('Registro exitoso Ubicacion');    
    </script>";
}else{
    echo "<script> alert('No se pudo realizar el registro Ubicacion'); 
    location.href = 'addcommercial.php';     
    </script>";
}

$codigoUbicacion = $conexion->insert_id;


$ancho = $_POST['ancho'];
$largo = $_POST['largo'];
$area = $_POST['area'];
$precio = $_POST['precio'];
$moneda = $_POST['moneda'];
$otros_detalles = $_POST['otros_detalles'];
$aforo = $_POST['aforo'];

/*
    VALIDAR SUBIDA DE FOTOS
*/

$foto = $_POST['foto'];

$sql = "INSERT INTO inmueble_detalles (ancho, largo, area, precio, moneda, otros_detalles, aforo, foto) VALUES('$ancho','$largo','$area','$precio','$moneda','$otros_detalles','$aforo','$foto')";
$query = mysqli_query($conexion, $sql);

if($query){
    echo "<script> alert('Registro exitoso inmueble_detalles');    
    </script>";
}else{
    echo "Error: " . $sql . "->" . $conexion->error;
    echo "<script> alert('No se pudo realizar el registro inmueble_Detalles'); 
    location.href = 'addcommercial.php';     
    </script>";
}

$codigoInmuebleDetalles = $conexion->insert_id;

$usuario = 2;

$sql = "INSERT INTO inmueble (tipo_inmueble, ubicacion, inmueble_detalles, contacto) VALUES('$codigoTipoInmueble','$codigoUbicacion','$codigoInmuebleDetalles','$usuario')";
$query = mysqli_query($conexion, $sql);

if($query){
    echo "<script> alert('Registro exitoso Inmueble');    
    </script>";
}else{
    echo "<script> alert('No se pudo realizar el registro Inmueble'); 
    location.href = 'addcommercial.php';     
    </script>";
}


/*
Datos de contacto 
*/



/*
codigo_inmueble
codigo_tipo_inmueble { codigo, nombre, descripcion }
codigo_ubicacion { codigo, direccion, distrito, provincia, departamento, fecha_creacion }
codigo_inmueble_detalles { codigo, ancho, largo, area, precio, codigo_moneda{
                                                                            codigo, nombre, simbolo, fecha_creacion
                                                                            } otrosDetalles, aforo, foto, fecha_creacion }
codigo_contacto{ nombres, apellidos, celular, correo }
estado
fecha_creacion

*/




/*
$dni = $_POST['dni'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];

$sql = "INSERT INTO usuario (nombres, apellidos, genero, dni, celular, correo, clave) VALUES('$nombres', '$apellidos', '$genero', '$dni', '$celular', '$correo', '$clave')";
$query = mysqli_query($conexion, $sql);

if($query){
    echo "<script> alert('Registro exitoso');
    location.href = 'index.html';      
    </script>";
}else{
    echo "<script> alert('No se pudo realizar el registro'); 
    location.href = 'index.html';     
    </script>";
}
*/




?>