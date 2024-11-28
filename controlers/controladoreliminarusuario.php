<?php
session_Start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaeliminarusuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}
$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];
    if ($tmpdatusuario) {
        $modelouUsuario = new modelusuario();
        try {
            $modelouUsuario->eliminarUsuario($tmpdatusuario);
            $mensaje = "Usuario eliminado con exito .....";
        } catch (PDOException $e) {
            $mensaje = "Hubo un error al querer eliminar este usuario...<br>" . $e->getMessage();
        }
    }
    mostrarFormularioEliminar($mensaje);
} else {

    mostrarFormularioEliminar();
}
