<!DOCTYPE html>
<html lang="es">

<?php
include("conexion.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Anuncios</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript">
        history.forward();
    </script>

    <?php require 'validarCliente.php'; ?>
</head>

<body>
    <!-- ====== Barra de navegacion ======-->
    <div class="full-width NavBar">
        <div class="full-width text-semi-bold NavBar-logo">
            Company
        </div>
        <nav class=" full-width NavBar-Nav">
            <div class="full-width NavBar-Nav-bg hidden-md hidden-lg show-menu-mobile"></div>
            <ul class="list-unstyled full-width menu-mobile-c">
                <div class="full-width hidden-md hidden-lg header-menu-mobile">
                    <i class="fa fa-times header-menu-mobile-close-btn show-menu-mobile" aria-hidden="true"></i>
                    <i class="fa fa-user NavBar-Nav-icon header-menu-mobile-icon" aria-hidden="true"></i>
                    <a href="login.html" class="btn btn-info header-menu-mobile-btn">INICIAR SESIÓN</a>
                    <div class="divider"></div>
                    <a href="newaccount.html" class="btn btn-primary header-menu-mobile-btn">CRÉATE UNA CUENTA</a>
                </div>
                <li>
                    <a href="index.html">
                        <i class="fa fa-home fa-fw hidden-md hidden-lg" aria-hidden="true"></i> INICIO
                    </a>
                </li>
                <li>
                    <a href="adcommercial.html">
                        <i class="fa fa-pencil-square-o fa-fw hidden-md hidden-lg" aria-hidden="true"></i> PON TU ANUNCIO
                    </a>
                </li>
                <li>
                    <a href="yourcommercial.html">
                        <i class="fa fa-object-group fa-fw hidden-md hidden-lg" aria-hidden="true"></i> TUS ANUNCIOS
                    </a>
                </li>
                <li>
                    <a href="messages.html">
                        <i class="fa fa-commenting-o fa-fw hidden-md hidden-lg" aria-hidden="true"></i> MENSAJES
                    </a>
                </li>
                <li>
                    <a href="favorites.html">
                        <i class="fa fa-heart-o fa-fw hidden-md hidden-lg" aria-hidden="true"></i> FAVORITOS
                    </a>
                </li>
                <li>
                    <a href="help.html">
                        <i class="fa fa-life-ring fa-fw hidden-md hidden-lg" aria-hidden="true"></i> AYUDA
                    </a>
                </li>
                <li class="hidden-xs hidden-sm"><a class="btn-PopUpLogin" href="#!">INICIAR SESIÓN</a></li>
                <li class="hidden-xs hidden-sm"><i class="fa fa-user NavBar-Nav-icon btn-PopUpLogin" aria-hidden="true"></i></li>
            </ul>
        </nav>
        <i class="fa fa-bars hidden-md hidden-lg btn-mobile-menu show-menu-mobile" aria-hidden="true"></i>
        <i class="fa fa-search hidden-md hidden-lg btn-mobile-menu btn-search-mobile" aria-hidden="true"></i>
    </div>
    <!-- ====== PopUpLogin ======-->
    <section class=" full-width PopUpLogin">
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#LoginTab1" aria-controls="LoginTab1" role="tab" data-toggle="tab">PARTICULAR</a></li>
            <li role="presentation"><a href="#LoginTab2" aria-controls="LoginTab2" role="tab" data-toggle="tab">TIENDA VIRTUAL</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="LoginTab1">
                <form action="login.html" style="padding-top: 15px;">
                    <div class="form-group">
                        <input type="email" class="form-control input-lg" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="Contraseña" required="">
                    </div>
                    <a class="text-left text-light" href="#!">No recuerdo mi contraseña</a>
                    <div class="checkbox full-width">
                        <label>
                            <input type="checkbox"> No cerrar sesión
                        </label>
                    </div>
                    <button class="btn btn-danger btn-lg" type="submit">INICIAR SESIÓN</button>
                </form>
                <div class="full-width divider"></div>
                <h4 class="text-center">¿Aún no tienes cuenta?</h4>
                <a class="text-light" href="newaccount.html">CRÉATE UNA GRATIS</a>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="LoginTab2">
                <form action="login.html" style="padding-top: 15px;">
                    <div class="form-group">
                        <input type="email" class="form-control input-lg" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" placeholder="Contraseña" required="">
                    </div>
                    <a class="text-left text-light" href="#!">No recuerdo mi contraseña</a>
                    <div class="checkbox full-width">
                        <label>
                            <input type="checkbox"> No cerrar sesión
                        </label>
                    </div>
                    <button class="btn btn-danger btn-lg" type="submit">INICIAR SESIÓN</button>
                </form>
            </div>
        </div>
    </section>

    <!-- ====== Contenido de pagina ======-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <?php

                    $sql = "select tipo_inmueble.nombre NOMBRE_TIPO_INMUEBLE, tipo_inmueble.descripcion DESCRIPCION_TIPO_INMUEBLE, ubicacion.direccion DIRECCION_UBICACION, ubicacion.distrito DISTRITO_UBICACION, 
                            ubicacion.provincia PROVINCIA_UBICACION, ubicacion.departamento DEPARTAMENTO_UBICACION, inmueble_detalles.ancho ANCHO_INMUEBLE_DETALLES, inmueble_detalles.largo LARGO_INMUEBLE_DETALLES, 
                            inmueble_detalles.area AREA_INMUEBLE_DETALLES, inmueble_detalles.precio PRECIO_INMUEBLE_DETALLES, inmueble_detalles.moneda MONEDA_INMUEBLE_DETALLES, inmueble_detalles.otros_detalles OTROS_DETALLES_INMUEBLE_DETALLES, 
                            inmueble_detalles.aforo AFORO_INMUEBLE_DETALLES, inmueble_detalles.foto FOTO_INMUEBLE_DETALLES, usuario.nombres NOMBRES_USUARIO, usuario.apellidos APELLIDOS_USUARIO, usuario.celular CELULAR_USUARIO, 
                            usuario.correo CORREO_USUARIO, DATE_FORMAT(inmueble.fecha_creacion, '%d %M %Y') FECHA_CREACION_INMUEBLE from inmueble
                            INNER JOIN tipo_inmueble
                            ON inmueble.tipo_inmueble = tipo_inmueble.codigo
                            INNER JOin ubicacion
                            ON inmueble.ubicacion = ubicacion.codigo
                            INNER JOIN inmueble_detalles
                            ON inmueble.inmueble_detalles = inmueble_detalles.codigo
                            INNER JOIN usuario
                            ON inmueble.contacto = usuario.codigo
                            WHERE inmueble.codigo = " . $_GET['codigo'];

                    $result = $conexion->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div id="slider-commercial" class="carousel slide" data-ride="carousel">
                                <center>
                                    <div class="item active">
                                        <?php
                                        echo '<img src="data:image/png;base64,' . base64_encode($row['FOTO_INMUEBLE_DETALLES']) . '" alt="" class="img-responsive"/>';
                                        ?>
                                    </div>
                                </center>
                            </div>

                            <br>
                            <p class="lead text-justify"><b>Descripción:</b>
                                <?php
                                echo $row['DESCRIPCION_TIPO_INMUEBLE'];
                                ?>
                            </p>
                            <div class="full-width div-table">
                                <div class="full-width div-table-row">
                                    <div class="div-table-cell div-table-cell-xs div-table-cell-c">
                                        <b>Ancho: </b> <?php echo $row['ANCHO_INMUEBLE_DETALLES']; ?> metros.
                                    </div>
                                    <div class="div-table-cell div-table-cell-xs div-table-cell-c">
                                        <b>Largo: </b> <?php echo $row['LARGO_INMUEBLE_DETALLES']; ?> metros.
                                    </div>
                                    <div class="div-table-cell div-table-cell-xs div-table-cell-c">
                                        <b>Área: </b> <?php echo $row['AREA_INMUEBLE_DETALLES']; ?> metros.
                                    </div>
                                </div>
                                <div class="full-width div-table-row">
                                    <div class="div-table-cell div-table-cell-xs div-table-cell-c">
                                        <b>Precio: </b>S/.<?php echo $row['PRECIO_INMUEBLE_DETALLES']; ?>
                                    </div>
                                    <div class="div-table-cell div-table-cell-xs div-table-cell-c">
                                        <b>Aforo: </b> <?php echo $row['AFORO_INMUEBLE_DETALLES']; ?>
                                    </div>
                                    <div class="div-table-cell div-table-cell-xs div-table-cell-c">
                                        <b>Otros Detalles: </b> <?php echo $row['OTROS_DETALLES_INMUEBLE_DETALLES']; ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <p>
                                <strong><b>Publicado: </b><?php echo $row['FECHA_CREACION_INMUEBLE']; ?></strong>
                            </p>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="full-width div-table">
                        <div class="full-width div-table-row">
                            <div class="div-table-cell div-table-cell-xs">
                                <a href="commercial.html" class="btn btn-default btn-block"><i class="fa fa-angle-left" aria-hidden="true"></i> Volver al listado</a>
                            </div>
                        </div>
                    </div>
                    <div class="full-width" style="padding:10px; background-color: #F5F5F5; margin: 7px 0;">
                        <p class="lead text-center"><strong><?php echo $row['NOMBRE_TIPO_INMUEBLE']; ?></strong></p>
                        <p class="lead text-center" style="color: #F09000;"><strong>S/.<?php echo $row['PRECIO_INMUEBLE_DETALLES']; ?></strong></p>
                    </div>
                    <div class="full-width post-user-info">
                        <i class="fa fa-user NavBar-Nav-icon" aria-hidden="true"></i>
                        <div>
                            <p class="full-width lead"><?php echo $row['NOMBRES_USUARIO']; ?></p>
                            <p class="full-width"><i class="fa fa-mobile" aria-hidden="true"></i> <?php echo $row['CELULAR_USUARIO']; ?></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <p class="lead text-light" style="margin: 7px 0; background-color: #F5F5F5;">
                        <b>Dirección:</b> <?php echo $row['DIRECCION_UBICACION']; ?>
                    </p>
                    <p class="lead text-light" style="margin: 7px 0; background-color: #F5F5F5;">
                        <b>Distrito:</b> <?php echo $row['DISTRITO_UBICACION']; ?>
                    </p>
                    <p class="lead text-light" style="margin: 7px 0; background-color: #F5F5F5;">
                        <b>Provincia:</b> <?php echo $row['PROVINCIA_UBICACION']; ?>
                    </p>
                    <p class="lead text-light" style="margin: 7px 0; background-color: #F5F5F5;">
                        <b>Departamento:</b> <?php echo $row['DEPARTAMENTO_UBICACION']; ?>
                    </p>
                    <div class="page-header">
                        <h3 class="text-light text-center">Comparte este anuncio</small></h1>
                    </div>
                    <ul class="list-unstyled fullwidth text-center footer-social social-post">
                        <li>
                            <a href="#!">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                    <a href="#!">¿ES TUYO? GESTIONAR ESTE ANUNCIO</a>
                </div>
            </div>
        </div>

    </section>
<?php
                        }
                    }
?>
<!-- ====== Pie de pagina ======-->
<footer class="full-width footer">
    <div class="container">
        <p class="text-semi-bold">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequatur quia voluptates voluptas accusamus aliquid in magni. Ullam non, at dolore accusantium ab fugit. Optio quidem blanditiis possimus at vero?
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum cum, ipsa ad, natus est deserunt perferendis assumenda ipsum esse voluptates quasi consectetur, laboriosam, sint suscipit quam sunt totam incidunt corporis.
        </p>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h4 class="text-light text-center">Síguenos en las redes sociales</h4>
                <ul class="list-unstyled fullwidth text-center footer-social">
                    <li>
                        <a href="#!">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!">
                            <i class="fa fa-youtube" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6">
                <h4 class="text-light text-center">Descárgate nuestras apps gratuitas</h4>
                <ul class="list-unstyled fullwidth text-center footer-app-store">
                    <li>
                        <a href="#!">
                            <i class="fa fa-apple" aria-hidden="true"></i> App Store
                        </a>
                    </li>
                    <li>
                        <a href="#!">
                            <i class="fa fa-android" aria-hidden="true"></i> Play Store
                        </a>
                    </li>
                    <li>
                        <a href="#!">
                            <i class="fa fa-windows" aria-hidden="true"></i> Windows Store
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="col-xs-12">
            <ul class="list-unstyled text-center full-width footer-copyright">
                <li>&copy; 2016 Company</li>
                <li><a href="#!">Condiciones de uso</a></li>
                <li><a href="#!">Ayuda</a></li>
                <li><a href="#!">Políticas de uso</a></li>
                <li><a href="#!">Apps</a></li>
            </ul>
        </div>
    </div>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>