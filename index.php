<!DOCTYPE html>
<html lang="es">

<?php
include("conexion.php");
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Página Principal</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/main.css">

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
					<a href="login.php" class="btn btn-info header-menu-mobile-btn">INICIAR SESIÓN</a>
					<div class="divider"></div>
					<a href="newaccount.html" class="btn btn-primary header-menu-mobile-btn">CRÉATE UNA CUENTA</a>
				</div>
				<li>
					<a href="index.html">
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
				<li class="hidden-xs hidden-sm"><a class="btn-PopUpLogin" href="login.php">INICIAR SESIÓN</a></li>
				<li class="hidden-xs hidden-sm"><i class="fa fa-user NavBar-Nav-icon btn-PopUpLogin" aria-hidden="true"></i></li>
			</ul>
		</nav>
		<i class="fa fa-bars hidden-md hidden-lg btn-mobile-menu show-menu-mobile" aria-hidden="true"></i>
	</div>
	<!-- ====== PopUpLogin ======-->
	<section class=" full-width PopUpLogin">
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
				<a class="text-light" href="newaccount.html">CRÉATE UNA GRATIS</a>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="LoginTab2">
				<form action="validar.php" method="POST" style="padding-top: 15px;">
					<div class="form-group">
						<input type="email" class="form-control input-lg" placeholder="Email" required="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control input-lg" placeholder="Contraseña" required="">
					</div>
					<button class="btn btn-danger btn-lg" type="submit">INICIAR SESIÓN</button>
				</form>
			</div>
		</div>
	</section>

	<!-- ====== Contenido de pagina ======-->
	<header class="full-width header-index">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center text-light">Tu nuevo comienzo empieza hoy</h1>
					<h1 class="text-center text-light">Busca tu hogar ideal...</h1>
				</div>
			</div>
		</div>
	</header>
	<section class="section">
		<h2 class="text-center text-light">Todas las categorías que imaginas</h2>
		<div class="container">
			<div class="full-width container-category">
				<a href="#!" id="categori-10">
					<i class="fa fa-suitcase" aria-hidden="true"></i>
					<span>TERRENOS</span>
				</a>

				<a href="#!" id="categori-3">
					<i class="fa fa-home" aria-hidden="true"></i>
					<span>HOGAR</span>
				</a>

				<a href="#!" id="categori-2">
					<i class="fa fa-building" aria-hidden="true"></i>
					<span>DEPARTAMENTOS</span>
				</a>

				<a href="anuncios.php" id="categori-12">
					<i class="fa fa-star" aria-hidden="true"></i>
					<span>TODAS LAS CATEGORIAS</span>
				</a>
			</div>
			<hr>
			<h2 class="text-center text-light">Últimos anuncios</h2><br>
			<?php

			$sql = "select inmueble.codigo CODIGO_INMUEBLE, tipo_inmueble.nombre NOMBRE_TIPO_INMUEBLE, tipo_inmueble.descripcion, ubicacion.direccion, ubicacion.distrito, ubicacion.provincia, ubicacion.departamento DEPARTAMENTO_UBICACION, inmueble_detalles.ancho, inmueble_detalles.largo, inmueble_detalles.area, inmueble_detalles.precio PRECIO_INMUEBLE_DETALLES, inmueble_detalles.moneda, inmueble_detalles.otros_detalles, inmueble_detalles.aforo, inmueble_detalles.foto FOTO_INMUEBLE_DETALLES, usuario.nombres, usuario.apellidos, usuario.celular, usuario.correo, DATE_FORMAT(inmueble.fecha_creacion, '%d %M %Y') FECHA_CREACION_INMUEBLE from inmueble
					INNER JOIN tipo_inmueble
					ON inmueble.tipo_inmueble = tipo_inmueble.codigo
					INNER JOin ubicacion
					ON inmueble.ubicacion = ubicacion.codigo
					INNER JOIN inmueble_detalles
					ON inmueble.inmueble_detalles = inmueble_detalles.codigo
					INNER JOIN usuario
					ON inmueble.contacto = usuario.codigo;";

			?>

			<div id="slider-commercial" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<center>
							<img src="assets/img/post.jpg" alt="">

							<h3><a href="google.com"> Ver anuncio</3>
						</center>
					</div>
					<?php
					$result = $conexion->query($sql);

					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
					?>
							<div class="item">
								<center>
									<?php
									echo '<img src="data:image/png;base64,' . base64_encode($row['FOTO_INMUEBLE_DETALLES']) . '" alt=""/>';
									?>
									<h3><a href="post.php?codigo=<?php echo $row['CODIGO_INMUEBLE']; ?>" class="full-width post-info-title">Ver anuncio</a></h3>
								</center>
							</div>
					<?php
						}
					}
					?>

				</div>
				<a class="left carousel-control" href="#slider-commercial" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#slider-commercial" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

		</div>
	</section>
	<section class="section" style="background-color: #F5F5F5">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<i class="fa fa-flag-checkered icon-index" aria-hidden="true"></i>
					<p class="lead">
						Encuentra cualquier tipo de inmueble en un solo lugar, elige entre terrenos, departamentos,
						hogares.
					</p>
				</div>
				<div class="col-xs-12 col-sm-4">
					<i class="fa fa-gamepad icon-index" aria-hidden="true"></i>
					<p class="lead">
						Publicaciones todos los dias y actualizaciones constantes para ofrecerte la mejor experiencia.
					</p>
				</div>
				<div class="col-xs-12 col-sm-4">
					<i class="fa fa-money icon-index" aria-hidden="true"></i>
					<p class="lead">
						Las mejores ofertas inmobiliarias y precios para todos los bolsillos.
					</p>
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