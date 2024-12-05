<?php
if (session_status() == PHP_SESSION_NONE) {

    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistamodificarusuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}
$modeloUsuario = new modelusuario();
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST["custId"])) {
        $tmpcustId = $_POST["custId"];
        $tmpdatusuario = $_POST["datusername"]; 
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];
        $modeloUsuario->modificarUsuario($tmpcustId, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);

        echo "Actualización con éxito .....";
    } else {
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
