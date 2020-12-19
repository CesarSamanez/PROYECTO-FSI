<!DOCTYPE html>
<html lang="es">
<?php
include("conexion.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Administración</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript">
        history.forward();
    </script>

    <?php require 'validarCliente.php'; ?>
    <?php require 'revisar_admin.php'; ?>
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

    <section class="full-width section" style="padding-left: 40px; padding-right: 40px;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col ">Código</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Género</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Función</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Creación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT *FROM usuario";
                $result = $conexion->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        /*
                        }
                    }
                    */
                ?>
                        <tr>
                            <td><?php echo $row['codigo']; ?></td>
                            <td><?php echo $row['nombres']; ?></td>
                            <td><?php echo $row['apellidos']; ?></td>
                            <td><?php echo $row['genero']; ?></td>
                            <td><?php echo $row['dni']; ?></td>
                            <td><?php echo $row['celular']; ?></td>
                            <td><?php echo $row['correo']; ?></td>
                            <td><?php
                                if ($row['rol'] == 0) {
                                    echo "Usuario";
                                } else {
                                    echo "Administrador";
                                }
                                ?>
                            </td>
                            <td><?php
                                if ($row['estado'] == 1) {
                                    echo "Activo";
                                } else {
                                    echo "Inactivo";
                                }
                                ?>
                            </td>
                            <td><?php echo $row['fecha_creacion']; ?></td>
                            <td>
                                <a type="button" name="<?php echo $row['codigo']; ?>" href="editUser.php?codigo=<?php echo $row['codigo']; ?>" class="btn btn-warning">Editar</a>
                                <!--
                                <a type="button" name="<?php //echo $row['codigo']; 
                                                        ?>" href="delete_user.php?codigo=<?php //echo $row['codigo']; 
                                                                                                                        ?>" class="btn btn-danger">Eliminar</a>
                            -->
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

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