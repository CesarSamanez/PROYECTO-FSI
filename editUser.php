<!DOCTYPE html>
<html lang="es">

<?php
include("conexion.php");

session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Nueva cuenta</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
    <?php require 'validarCliente.php'; ?>
	<?php require 'revisar_admin.php'; ?>
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

            <?php
            $codigo_usuario = $_GET['codigo'];

            $sql = "SELECT *FROM usuario where codigo=$codigo_usuario";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>

                    <div class="col-xs-12">
                        <div class="full-width container-login">
                            <i class="fa fa-user container-login-icon" aria-hidden="true"></i>
                            <h4 class="text-center text-light">MODIFICAR UNA CUENTA</h4>
                            <br>
                            <form action="edit_user.php" method="POST">
							<div class=" form-group">
                                <input type="text" name="nombres" value="<?php echo $row['nombres']; ?>" minlength="1" maxlength="30" class="form-control input-lg" placeholder="Nombres" required pattern="[A-Z|a-z| ]+" title="El campo solo debe contener letras.">
                        </div>

                        <div class="form-group">
                            <input type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>" minlength="1" maxlength="30" class="form-control input-lg" placeholder="Apellidos" required pattern="[A-Z|a-z| ]+" title="El campo solo debe contener letras.">
                        </div>

                        <div class="form-group">
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
                            <input type="text" name="dni" value="<?php echo $row['dni']; ?>" minlength="8" maxlength="8" class="form-control input-lg" placeholder="Dni" required pattern="[0-9]{8}" title="El campo solo debe contener dígitos numéricos.">
                        </div>

                        <div class="form-group">
                            <input type="text" name="celular" value="<?php echo $row['celular']; ?>" minlength="9" maxlength="9" class="form-control input-lg" placeholder="Celular" required pattern="[0-9]+" title="El campo solo debe contener dígitos numéricos.">
                        </div>

                        <div class="form-group">
                            <input type="email" name="correo" value="<?php echo $row['correo']; ?>" maxlength="20" class="form-control input-lg" placeholder="Correo" required="">
                        </div>

                        <div class="form-group">
                            <input type="password" name="clave" value="<?php echo $row['clave']; ?>" maxlength="10" class="form-control input-lg" placeholder="Clave" required="">
                        </div>

                        <div class="form-group">
                            <select name="rol" class="form-control input-lg" required>
                                <option value="<?php echo $row['rol']; ?>">
                                    <?php
                                    if ($row['rol']) {
                                    ?>
                                        Administrador</option>
                                <option value="0">Usuario</option>
                            <?php
                                    } else {
                            ?>
                                Usuario</option>
                                <option value="1">Administrador</option>
                            <?php
                                    }
                            ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <select name="estado" class="form-control input-lg" required>
                                <option value="<?php echo $row['estado']; ?>">
                                    <?php
                                    if ($row['estado']) {
                                    ?>
                                        Activo</option>
                                <option value="0">Inactivo</option>
                            <?php
                                    } else {
                            ?>
                                Inactivo</option>
                                <option value="1">Activo</option>
                            <?php
                                    }
                            ?>
                            </select>
                        </div>

                <?php
                }
            }
                ?>

                <button class="btn btn-primary btn-lg" type="submit">GUARDAR CAMBIOS</button>
                <br><a href="administration.php" class="btn btn-danger btn-lg" t>CANCELAR</a>
                </form>
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