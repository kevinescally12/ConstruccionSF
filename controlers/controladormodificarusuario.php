<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistamodificarusuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $modeloUsuario = new modelusuario();

    // Verificar si custId está definido en $_POST
    if (isset($_POST["custId"])) {
        $tmpcustId = $_POST["custId"];
        $tmpdatusuario = $_POST["datusername"]; // Corrección del nombre del campo
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];
        $modeloUsuario->modificarUsuario($tmpcustId, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);

        echo "Actualización con éxito .....";
    } else {
        // Fluj para buscar usuario por nombre
        $tmpdatusuario = $_POST["datusuario"];
        $usuario = $modeloUsuario->obteberUsuarioNombre($tmpdatusuario);
        if ($usuario) {
            mostrarFormularioEdicion($usuario);
        } else {
            mostrarFormularioBusqueda("Usuario no encontrado .....");
        }
    }
} else {
    mostrarFormularioBusqueda();
}
