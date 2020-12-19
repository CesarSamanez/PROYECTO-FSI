<!DOCTYPE html>
<html lang="es">

<?php
include("conexion.php");
session_start();
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
</head>

<body>
	<!-- ====== Barra de navegacion ======-->
	<div class="full-width NavBar">
		<div class="full-width text-semi-bold NavBar-logo">
			BHOUSE
		</div>
		<nav class=" full-width NavBar-Nav">
			<div class="full-width NavBar-Nav-bg hidden-md hidden-lg show-menu-mobile"></div>
			<ul class="list-unstyled full-width menu-mobile-c">
				<div class="full-width hidden-md hidden-lg header-menu-mobile">
					<i class="fa fa-times header-menu-mobile-close-btn show-menu-mobile" aria-hidden="true"></i>
					<i class="fa fa-user NavBar-Nav-icon header-menu-mobile-icon" aria-hidden="true"></i>
					<?php
					if (empty($_SESSION)) {
					?>
						<a href="login.php" class="btn btn-info header-menu-mobile-btn">INICIAR SESIÓN</a>
						<div class="divider"></div>
						<a href="newaccount.php" class="btn btn-primary header-menu-mobile-btn">CRÉATE UNA CUENTA</a>
					<?php
					} else {
					?>
						<a href="cerrar_sesion.php" class="btn btn-warning header-menu-mobile-btn">CERRAR SESIÓN</a>
					<?php
					}
					?>
				</div>
				<li>
					<a href="index.php">
						<i class="fa fa-home fa-fw hidden-md hidden-lg" aria-hidden="true"></i> INICIO
					</a>
				</li>
				<li>
					<a href="anuncios.php">
						<i class="fa fa-home fa-fw hidden-md hidden-lg" aria-hidden="true"></i> ÚLTIMOS ANUNCIOS
					</a>
				</li>
				<li>
					<a href="addcommercial.php">
						<i class="fa fa-pencil-square-o fa-fw hidden-md hidden-lg" aria-hidden="true"></i> PUBLICA TU
						ANUNCIO
					</a>
				</li>
				<li>
					<a href="yourcommercial.php">
						<i class="fa fa-object-group fa-fw hidden-md hidden-lg" aria-hidden="true"></i> TUS ANUNCIOS
					</a>
				</li>
				<li>
					<a href="perfil.php">
						<i class="fa fa-object-group fa-fw hidden-md hidden-lg" aria-hidden="true"></i> TU PERFIL
					</a>
				</li>
				<li>
					<a href="administration.php">
						<i class="fa fa-object-group fa-fw hidden-md hidden-lg" aria-hidden="true"></i> ADMINISTRADORES
					</a>
				</li>
				<li class="hidden-xs hidden-sm"><a class="btn-PopUpLogin"></a></li>
				<li class="hidden-xs hidden-sm"><i class="fa fa-user NavBar-Nav-icon btn-PopUpLogin" aria-hidden="true"></i></li>
			</ul>
		</nav>
		<i class="fa fa-bars hidden-md hidden-lg btn-mobile-menu show-menu-mobile" aria-hidden="true"></i>
	</div>
	<!-- ====== PopUpLogin ======-->
	<section class=" full-width PopUpLogin">
		<?php
		if (empty($_SESSION)) {
		?>
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li role="presentation" class="active"><a href="#LoginTab1" aria-controls="LoginTab1" role="tab" data-toggle="tab">PARTICULAR</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="LoginTab1">
					<form action="validar.php" method="POST" style="padding-top: 15px;">
						<div class="form-group">
							<input type="email" name="email" class="form-control input-lg" placeholder="Email" required="">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control input-lg" placeholder="Contraseña" required="">
						</div>
						<button class="btn btn-danger btn-lg" type="submit">INICIAR SESIÓN</button>
					</form>
					<div class="full-width divider"></div>
					<h4 class="text-center">¿Aún no tienes cuenta?</h4>
					<a class="text-light" href="newaccount.php">CRÉATE UNA GRATIS</a>
				</div>
			<?php
		} else {
			?>
				<a href="cerrar_sesion.php" class="btn btn-warning header-menu-mobile-btn">CERRAR SESIÓN</a>
			<?php
		}
			?>
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
                            <p class="lead text-justify">
                                <b>Publicado: </b><?php echo $row['FECHA_CREACION_INMUEBLE']; ?>
                            </p>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="full-width div-table">
                        <div class="full-width div-table-row">
                            <div class="div-table-cell div-table-cell-xs">
                                <a href="anuncios.php" class="btn btn-default btn-block"><i class="fa fa-angle-left" aria-hidden="true"></i> Volver al listado</a>
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
    <h4 class="text-light text-center"><b>Proyecto Fundamentos de Sistemas de Información</b></h4>
    <ul class="list-unstyled fullwidth text-center footer-app-store">
        <li>
            <a href="#!">
                <i class="fa fa-university" aria-hidden="true"></i>Universidad Nacional de San
                Agustín
            </a>
        </li>
        <li>
            <a href="#!">
                <i class="fa fa-book" aria-hidden="true"></i> Escuela Profesional de Ingeniería de
                Sistemas
            </a>
        </li>
    </ul>

    <br>
    <div class="container">
        <div class="col-xs-12">
            <ul class="list-unstyled text-center full-width footer-copyright">
                <li>&copy; 2020 Copyright</li>
                <li><a href="#!">Equipo de Desarrollo</a></li>
                <li><a href="#!">Repositorio</a></li>
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