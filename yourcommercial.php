<!DOCTYPE html>
<?php
include("conexion.php");
?>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Tus anuncios</title>
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
			PROYECTO-FSI
		</div>
		<nav class=" full-width NavBar-Nav">
			<div class="full-width NavBar-Nav-bg hidden-md hidden-lg show-menu-mobile"></div>
			<ul class="list-unstyled full-width menu-mobile-c">
				<div class="full-width hidden-md hidden-lg header-menu-mobile">
					<i class="fa fa-times header-menu-mobile-close-btn show-menu-mobile" aria-hidden="true"></i>
					<!--<i class="fa fa-user NavBar-Nav-icon header-menu-mobile-icon" aria-hidden="true"></i>-->
					<img src="assets/img/user.png" alt="" class="header-menu-mobile-icon">
					<div class="divider"></div>
					<a href="#!" class="btn btn-success header-menu-mobile-btn">
						<i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Cerrar sesión
					</a>
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
				<li class="hidden-xs hidden-sm"><a class="btn-PopUpLogin" href="#!"><?php echo strtoupper($_SESSION['nombres']); ?></a></li>
				<li class="hidden-xs hidden-sm">
					<!--<i class="fa fa-user NavBar-Nav-icon btn-PopUpLogin" aria-hidden="true"></i>-->
					<img src="assets/img/user.png" alt="" class="NavBar-Nav-icon btn-PopUpLogin">
				</li>
			</ul>
		</nav>
		<i class="fa fa-bars hidden-md hidden-lg btn-mobile-menu show-menu-mobile" aria-hidden="true"></i>
	</div>
	<!-- ====== PopUpLogin ======-->
	<section class="full-width PopUpLogin PopUpLogin-2">
		<div class="full-width">
			<a href="perfil.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Tu perfil</a>
			<div role="separator" class="divider"></div>
			<a href="#!"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Cerrar sesión</a>
		</div>
	</section>

	<!-- ====== Contenido de pagina ======-->
	<section class="full-width section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3">
					<buttom class="btn btn-default btn-block visible-xs btn-dropdown-conatiner" data-drop-cont=".user-menu-xs">
						<i class="fa fa-user fa-fw" aria-hidden="true"></i> MOSTRAR MENÚ <i class="fa fa-sort pull-right" aria-hidden="true"></i>
					</buttom>
					<div class="full-width user-menu-xs">
						<div class="full-width post-user-info" style="margin: 0 !important;">
							<!--<i class="fa fa-user NavBar-Nav-icon" aria-hidden="true"></i>-->
							<img src="assets/img/user.png" class="NavBar-Nav-icon" alt="User">
							<p class="full-width"><small><?php echo strtoupper($_SESSION['nombres']); ?> <?php echo strtoupper($_SESSION['apellidos']); ?></small></p>
							<br>
							<div class="full-width div-table">
							</div>
						</div>
						<div class="full-width list-group" style="border-radius: 0;">
							<div class="list-group-item text-center">
								<p><small>Última conexión</small></p>
								<p><small><?php echo date_create()->format('d-m-Y H:i:s'); ?> </small></p>
							</div>

							<a href="perfil.php" class="list-group-item">
								<i class="fa fa-user fa-fw" aria-hidden="true"></i> TU PERFIL
							</a>

							<a href="yourcommercial.php" class="list-group-item active">
								<i class="fa fa-object-group fa-fw" aria-hidden="true"></i> TUS ANUNCIOS
							</a>

						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9">
					<div class="full-width bar-info-user">
						<i class="fa fa-object-group fa-fw" aria-hidden="true"></i>
						<div>TUS ANUNCIOS</div>
					</div>
					<!-- Contenido-->

					<div class="full-width container-post">
						<?php

						$sql = "select inmueble.codigo CODIGO_INMUEBLE, tipo_inmueble.nombre NOMBRE_TIPO_INMUEBLE, tipo_inmueble.descripcion, ubicacion.direccion, ubicacion.distrito, ubicacion.provincia, ubicacion.departamento DEPARTAMENTO_UBICACION, inmueble_detalles.ancho, inmueble_detalles.largo, inmueble_detalles.area, inmueble_detalles.precio PRECIO_INMUEBLE_DETALLES, inmueble_detalles.moneda, inmueble_detalles.otros_detalles, inmueble_detalles.aforo, inmueble_detalles.foto FOTO_INMUEBLE_DETALLES, usuario.nombres, usuario.apellidos, usuario.celular, usuario.correo, DATE_FORMAT(inmueble.fecha_creacion, '%d %M %Y') FECHA_CREACION_INMUEBLE from inmueble
					INNER JOIN tipo_inmueble
					ON inmueble.tipo_inmueble = tipo_inmueble.codigo
					INNER JOin ubicacion
					ON inmueble.ubicacion = ubicacion.codigo
					INNER JOIN inmueble_detalles
					ON inmueble.inmueble_detalles = inmueble_detalles.codigo
					INNER JOIN usuario
					ON inmueble.contacto = usuario.codigo
					WHERE inmueble.contacto = " . $_SESSION['codigo'];

						$result = $conexion->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
						?>

								<div class="full-width post">
									<figure class="full-width post-img">
										<!-- Tamaño de la imagen 248x186 pixeles-->
										<?php
										echo '<img src="data:image/png;base64,' . base64_encode($row['FOTO_INMUEBLE_DETALLES']) . '" alt="" class="img-responsive" />';
										?>
									</figure>
									<div class="full-width post-info">
										<a href="post.php?codigo=<?php echo $row['CODIGO_INMUEBLE']; ?>" class="full-width post-info-title"><?php echo $row['NOMBRE_TIPO_INMUEBLE']; ?></a>
										<p class="full-width post-info-price">$ <?php echo $row['PRECIO_INMUEBLE_DETALLES']; ?></p>
										<span class="post-info-zone"><?php echo $row['DEPARTAMENTO_UBICACION']; ?></span>
										<br>
										<span class="post-info-date"><?php echo $row['FECHA_CREACION_INMUEBLE']; ?></span>
										<i class="fa fa-heart-o post-info-like"></i>
									</div>
								</div>

						<?php
							}
						}
						?>
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>
	</section>
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