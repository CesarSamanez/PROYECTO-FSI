<!DOCTYPE html>
<html lang="es">
	
<?php
include("conexion.php");
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Pon tu anuncio</title>
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
						<i class="fa fa-pencil-square-o fa-fw hidden-md hidden-lg" aria-hidden="true"></i> PON TU
						ANUNCIO
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
			<li role="presentation"><a href="#LoginTab2" aria-controls="LoginTab2" role="tab" data-toggle="tab">TIENDA
					VIRTUAL</a></li>
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
	<section class="section">
		<h2 class="text-center text-light">Publica tu anuncio gratis</h2>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 col-sm-offset-1" style="border: 1px solid #E1E1E1;">
					<form action="insertInmueble.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
						<h3 class="text-info">Datos generales</h3>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tipo de inmueble</label>
							<div class="col-sm-7">
								<input type="text" name="tipo_inmueble" maxlength="30" class="form-control" placeholder="Tipo de inmueble" required pattern="[a-zA-Z\ ]+" title="Solo letras.">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Descripción</label>
							<div class="col-sm-7">
								<textarea class="form-control" name="descripcion" maxlength="100" rows="3" placeholder="Descripción" required></textarea>
							</div>
						</div>
						<h3 class="text-info">Ubicación</h3>

						<div class="form-group">
							<label class="col-sm-3 control-label">Dirección</label>
							<div class="col-sm-7">
								<input type="text" name="direccion" maxlength="40" class="form-control" placeholder="Dirección" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Departamento</label>
							<div class="col-sm-7">
								<select name="departamento" class="form-control input-md" required>
									<option value="" disable selected>Selecciona el departamento</option>
									<?php
									$sql = "SELECT DISTINCT departamento FROM lugares ORDER BY departamento ASC";
									$result = $conexion->query($sql);

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<option value="<?php echo $row['departamento']; ?>"><?php echo $row['departamento']; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Provincia</label>
							<div class="col-sm-7">
								<select name="provincia" class="form-control input-md" required>
									<option value="" disable selected>Selecciona la provincia</option>
									<?php
									$sql = "SELECT DISTINCT provincia FROM lugares ORDER BY provincia ASC";
									$result = $conexion->query($sql);

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<option value="<?php echo $row['provincia']; ?>"><?php echo $row['provincia']; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Distrito</label>
							<div class="col-sm-7">
								<select name="distrito" class="form-control input-md" required>
									<option value="" disable selected>Selecciona el distrito</option>
									<?php
									$sql = "SELECT DISTINCT distrito FROM lugares ORDER BY distrito ASC";
									$result = $conexion->query($sql);

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<option value="<?php echo $row['distrito']; ?>"><?php echo $row['distrito']; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>

						<br>
						<h3 class="text-info">Detalles de tu anuncio</h3>
						<div class="form-group">
							<label class="col-sm-3 control-label">Ancho</label>
							<div class="col-sm-7">
								<input type="text" name="ancho" maxlength="5" class="form-control" placeholder="Ancho" required pattern="([0-9]+[\.]{1})?[0-9]+">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Largo</label>
							<div class="col-sm-7">
								<input type="text" name="largo" maxlength="5" class="form-control" placeholder="Largo" required pattern="([0-9]+[\.]{1})?[0-9]+">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Área</label>
							<div class="col-sm-7">
								<input type="text" name="area" maxlength="5" class="form-control" placeholder="Área" required pattern="([0-9]+[\.]{1})?[0-9]+">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Precio</label>
							<div class="col-sm-7">
								<input type="text" name="precio" maxlength="8" class="form-control" placeholder="Precio" required pattern="([0-9]+[\.]{1})?[0-9]+">
							</div>
						</div>

						<div class="form-group">

							<label class="col-sm-3 control-label">Moneda</label>
							<div class="col-sm-7">
								<select name="moneda" class="form-control input-md" required>
									<option value="" disable selected>Selecciona la moneda</option>
									<?php
									$sql = "SELECT *FROM moneda";
									$result = $conexion->query($sql);

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
									?>
											<option value="<?php echo $row['codigo']; ?>"><?php echo $row['nombre']; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Otros detalles</label>
							<div class="col-sm-7">
								<textarea class="form-control" name="otros_detalles" maxlength="100" rows="3" placeholder="Otros detalles" required></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Aforo</label>
							<div class="col-sm-7">
								<input type="text" name="aforo" maxlength="5" class="form-control" placeholder="Aforo" required pattern="[0-9]+">
							</div>
						</div>

						<h3 class="text-info">Foto</h3>
						<p>¡Los anuncios con fotos reciben 7 veces más contactos!</p>
						<div class="form-group">
							<div class="custom-input-file">
								<input type="file" name="foto" size="1" class="input-file" />
								<i class="fa fa-picture-o" aria-hidden="true"></i>
							</div>
							<br>
							<p class="text-muted text-center archivo">Elige un archivo</p>
						</div>

						<br>
						<h3 class="text-info">Datos de contacto</h3>
						<div class="form-group">
							<label class="col-sm-3 control-label">Nombres</label>
							<div class="col-sm-7">
								<input type="text" name="nombres" class="form-control" placeholder="Nombres" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Apellidos</label>
							<div class="col-sm-7">
								<input type="text" name="apellidos" class="form-control" placeholder="Apellidos" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Celular</label>
							<div class="col-sm-7">
								<input type="text" name="celular" class="form-control" placeholder="Celular" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">E-Mail</label>
							<div class="col-sm-7">
								<input type="email" name="" class="form-control" placeholder="E-Mail" disabled>
							</div>
						</div>
						<br>
						<p class="text-center">
							<button type="submit" class="btn btn-info">Continuar</button>
						</p>
						<br>

					</form>
				</div>
			</div>
		</div>
		</div>

	</section>
	<!-- ====== Pie de pagina ======-->
	<footer class="full-width footer">
		<h4 class="text-light text-center"><b>Proyecto Final Fundamentos de Sistemas de Información</b></h4>
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