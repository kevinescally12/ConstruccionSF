<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

session_start();
if (!isset($_SESSION["txtusername"])) {
    header("Location: " . get_urlBase('index.php'));
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilodashboard.css'); ?>">
</head>

<body>
    <div class="menu">
        <h3>Este es el menú</h3>
        <ul>
            <li><a href="?opcion=inicio">Inicio</a></li>
            <li><a href="?opcion=ver">Ver</a></li>
            <li><a href="?opcion=ingresar">Ingresar</a></li>
            <li><a href="?opcion=modificar">Modificar</a></li>
            <li><a href="?opcion=eliminar">Eliminar</a></li>
        </ul>
        <div class="menu-footer">
            <a href="<?php echo get_controlers('logout.php'); ?>">Salir del sistema</a>
            <p>Contacto: 992214567</p>
            <a href="https://wa.me/992214567" target="_blank">Contáctanos en WhatsApp</a>
        </div>
    </div>

    <div class="content">
        <?php
        $opcion = isset($_GET["opcion"]) ? $_GET["opcion"] : 'inicio';

        switch ($opcion) {
            case 'inicio':
                echo "<div class='header-section'>
                        <h2>Bienvenido al Dashboard</h2>
                        <p>Aquí puedes gestionar y visualizar la información del sistema.</p>
                      </div>
                      <div class='cards'>
                          <div class='card'>
                              <img src='" . get_urlBase('img/usuarioimg.png') . "' alt='Icono 1'>
                              <h3>Total de Usuarios</h3>
                              <p>1,245</p>
                          </div>
                          <div class='card'>
                              <img src='" . get_urlBase('img/dineroimg.png') . "' alt='Icono 2'>
                              <h3>Ventas Mensuales</h3>
                              <p>$13,500</p>
                          </div>
                          <div class='card'>
                              <img src='" . get_urlBase('img/ticket.jpg') . "' alt='Icono 3'>
                              <h3>Tickets Abiertos</h3>
                              <p>37</p>
                          </div>
                      </div>";
                break;

            case 'ver':
                echo "<iframe src='" . get_controlers('controladorusuario.php') . "'class ='caja_lugar' ></iframe>";
                break;

            case 'ingresar':
                echo "<iframe src='" . get_controlers('controladoringresarusuario.php') . "'class ='caja_lugar' ></iframe>";
                break;

            case 'modificar':
                echo "<iframe src='" . get_views('modidicardatos.php') . "' class ='caja_lugar'></iframe>";
                break;

            case 'eliminar':
                echo "<iframe src='" . get_views('eliminardatos.php') . "'class ='caja_lugar' ></iframe>";
                break;

            default:
                echo "<h2>Opción no válida</h2>";
                break;
        }
        ?>
    </div>
</body>

</html>
