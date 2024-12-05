<?php

if (session_status() == PHP_SESSION_NONE) {

    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

if (!isset($_SESSION["txtusername"])) {
    header("Location: " . get_urlBase('index.php'));
    exit();
}

$opcion = $_GET["opcion"] ?? 'inicio';
$contenido = '';

switch ($opcion) {
    case 'inicio':
        $contenido = "<h1> Bienvenido al sistema </h1>";
        break;

    case 'ver':

        ob_start();
        include get_controlers_disc('controladorusuario.php');
        $contenido = ob_get_clean();
        break;

    case 'ingresar':

        ob_start();
        include get_controlers_disc('controladoringresarusuario.php');
        $contenido = ob_get_clean();
        break;

    case 'modificar':

        ob_start();
        include get_controlers_disc('controladormodificarusuario.php');
        $contenido = ob_get_clean();
        break;

    case 'eliminar':

        ob_start();
        include get_controlers_disc('controladoreliminarusuario.php');
        $contenido = ob_get_clean();
        break;

    default:
        http_response_code(400);
        $contenido = "<h1> Error </h1>";
        break;
}

include get_views_disc('vistadashboard.php');
