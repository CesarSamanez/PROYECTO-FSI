<!DOCTYPE html>
<html lang="es">
<?php
include("conexion.php");

session_start();
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Inicio de sesión</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript">
		history.forward();
	</script>

	<?php require 'validarSesionActiva.php'; ?>
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
	<section class="full-width section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3">
					<div class="full-width container-login">
						<i class="fa fa-user container-login-icon" aria-hidden="true"></i>
						<h4 class="text-center text-light">INICIAR SESIÓN</h4>
						<br>
						<form action="validar.php" method="POST">
							<div class="form-group">
								<input type="email" name="email" class="form-control input-lg" placeholder="Email" required="">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control input-lg" placeholder="Contraseña" required="">
							</div>
							<button class="btn btn-danger btn-lg" type="submit">INICIAR SESIÓN</button>
							<a href="newaccount.php" class="text-center">Si eres nuevo ¡Crea una cuenta!</a>
						</form>
					</div>
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
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>