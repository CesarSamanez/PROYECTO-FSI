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
			Company
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
				<li class="hidden-xs hidden-sm"><a class="btn-PopUpLogin" href="#!"><?php echo strtoupper($_SESSION['nombres']); ?></a></li>
				<li class="hidden-xs hidden-sm">
					<!--<i class="fa fa-user NavBar-Nav-icon btn-PopUpLogin" aria-hidden="true"></i>-->
					<img src="assets/img/user.png" alt="" class="NavBar-Nav-icon btn-PopUpLogin">
				</li>
			</ul>
		</nav>
		<i class="fa fa-bars hidden-md hidden-lg btn-mobile-menu show-menu-mobile" aria-hidden="true"></i>
		<i class="fa fa-search hidden-md hidden-lg btn-mobile-menu btn-search-mobile" aria-hidden="true"></i>
	</div>
	<!-- ====== PopUpLogin ======-->
	<section class="full-width PopUpLogin PopUpLogin-2">
		<div class="full-width">
			<a href="perfil.html"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Tu perfil</a>
			<a href="config.html"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Configuración</a>
			<div role="separator" class="divider"></div>
			<a href="#!"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Cerrar sesión</a>
		</div>
	</section>
	<!-- ====== Buscador movil ======-->
	<section class="full-width hidden-md hidden-lg Search-mobile">
		<form action="commercial.html" style="padding-top: 15px;">
			<div class="form-group">
				<input type="text" class="form-control input-lg" placeholder="Estoy buscado..." required="">
			</div>
			<div class="form-group">
				<input type="text" class="form-control input-lg" placeholder="Provincia, ciudad, distrito..." required="">
			</div>
			<button class="btn btn-danger btn-lg" type="submit">BUSCAR</button>
		</form>
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

							<a href="perfil.html" class="list-group-item">
								<i class="fa fa-user fa-fw" aria-hidden="true"></i> TU PERFIL
							</a>

							<a href="yourcommercial.html" class="list-group-item active">
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

					$sql = "select tipo_inmueble.nombre, tipo_inmueble.descripcion, ubicacion.direccion, ubicacion.distrito, ubicacion.provincia, ubicacion.departamento, inmueble_detalles.ancho, inmueble_detalles.largo, inmueble_detalles.area, inmueble_detalles.precio, inmueble_detalles.moneda, inmueble_detalles.otros_detalles, inmueble_detalles.aforo, inmueble_detalles.foto, usuario.nombres, usuario.apellidos, usuario.celular, usuario.correo, inmueble.fecha_creacion from inmueble
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
										<img src="" alt="" class="img-responsive">
									</figure>
									<div class="full-width post-info">
										<a href="post.html" class="full-width post-info-title"><?php echo $row['nombre']; ?></a>
										<p class="full-width post-info-price">$ <?php echo $row['precio']; ?></p>
										<span class="post-info-zone">Zona: <?php echo $row['departamento']; ?></span>
										<span class="post-info-date">Fecha: <?php $row['inmueble']['fecha_creacion']; ?></span>
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