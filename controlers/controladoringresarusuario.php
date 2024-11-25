<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaingresarusuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

$mensaje = ''; 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $tmpdatusuario = $_POST["datusuario"] ?? ''; 
    $tmpdatpassword = $_POST["datpassword"] ?? '';
    $tmpdatperfil = $_POST["datperfil"] ?? '';

    $modeloUsuario = new modelusuario();

    try {
        $modeloUsuario->insertarUsuario($tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
        $mensaje = "Usuario registrado con éxito.";
    } catch (PDOException $e) {
        $mensaje = "Hubo un error al registrar el usuario: " . $e->getMessage();
    }
}
mostrarFormularioIngreso($mensaje);