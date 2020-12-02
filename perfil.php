<!DOCTYPE html>
<html lang="es">

<?php
include("conexion.php");
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Perfil</title>
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
				<li class="hidden-xs hidden-sm"><a class="btn-PopUpLogin" href="#!">Nombre</a></li>
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
				<?php
				$codigo_usuario = $_SESSION['codigo'];

				$sql = "SELECT *FROM usuario where codigo=$codigo_usuario";
				$result = $conexion->query($sql);

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
				?>
						<div class="col-xs-12 col-sm-4 col-md-3">
							<buttom class="btn btn-default btn-block visible-xs btn-dropdown-conatiner" data-drop-cont=".user-menu-xs">
								<i class="fa fa-user fa-fw" aria-hidden="true"></i> MOSTRAR MENÚ <i class="fa fa-sort pull-right" aria-hidden="true"></i>
							</buttom>
							<div class="full-width user-menu-xs">
								<div class="full-width post-user-info" style="margin: 0 !important;">
									<!--<i class="fa fa-user NavBar-Nav-icon" aria-hidden="true"></i>-->
									<img src="assets/img/user.png" class="NavBar-Nav-icon" alt="User">
									<p class="full-width"><small><?php echo strtoupper($row['nombres']); ?></small></p>
								</div>
								<div class="full-width list-group" style="border-radius: 0;">
									<div class="list-group-item text-center">
										<small><b>Creado:</b> <?php echo $row['fecha_creacion']; ?></small>
									</div>
									<a href="perfil.html" class="list-group-item active">
										<i class="fa fa-user fa-fw" aria-hidden="true"></i> TU PERFIL
									</a>
									<a href="yourcommercial.html" class="list-group-item">
										<i class="fa fa-object-group fa-fw" aria-hidden="true"></i> TUS ANUNCIOS
									</a>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-8 col-md-9">
							<div class="full-width bar-info-user">
								<i class="fa fa-user fa-fw" aria-hidden="true"></i>
								<div>TU PERFIL</div>
							</div>
							<!-- Contenido-->
							<div class="full-width" style="padding: 15px; border: 1px solid #E1E1E1;">
								<form action="edit_perfil.php" method="POST">
									<div class="form-group">

									</div>
									<div class=" form-group">
										<label>Nombres</label>
										<input type="text" name="nombres" value="<?php echo $row['nombres']; ?>" minlength="1" maxlength="40" class="form-control input-lg" placeholder="Nombres" required pattern="[A-Z|a-z| ]+" title="El campo solo debe contener letras.">
									</div>

									<div class="form-group">
										<label>Apellidos</label>
										<input type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>" minlength="1" maxlength="40" class="form-control input-lg" placeholder="Apellidos" required pattern="[A-Z|a-z| ]+" title="El campo solo debe contener letras.">
									</div>

									<div class="form-group">
										<label>Género</label>
										<select name="genero" class="form-control input-lg" required>
											<option value="<?php echo $row['genero']; ?>">
												<?php
												if ($row['genero'] == 'Masculino') { ?>
													Masculino</option>
											<option value="Femenino">Femenino</option>
										<?php
												} else {
										?>
											Femenino</option>
											<option value="Masculino">Masculino</option>
										<?php
												}
										?>
										</select>
									</div>

									<div class="form-group">
										<label>Dni:</label>
										<input type="text" name="dni" value="<?php echo $row['dni']; ?>" minlength="8" maxlength="8" class="form-control input-lg" placeholder="Dni" required pattern="[0-9]{8}" title="El campo solo debe contener dígitos numéricos.">
									</div>

									<div class="form-group">
										<label>Celular</label>
										<input type="text" name="celular" value="<?php echo $row['celular']; ?>" minlength="9" maxlength="9" class="form-control input-lg" placeholder="Celular" required pattern="[0-9]+" title="El campo solo debe contener dígitos numéricos.">
									</div>

									<div class="form-group">
										<label>Correo</label>
										<input type="email" name="correo" value="<?php echo $row['correo']; ?>" maxlength="30" class="form-control input-lg" placeholder="Correo" required="">
									</div>

									<div class="form-group">
										<label>Clave</label>
										<input type="password" name="clave" value="<?php echo $row['clave']; ?>" maxlength="10" class="form-control input-lg" placeholder="Clave" required="">
									</div>

							<?php
						}
					}
							?>
							<center>
								<button class="btn btn-primary btn-lg" type="submit">GUARDAR CAMBIOS</button>
							</center>
								</form>
							</div>
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