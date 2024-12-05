<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type: application/json");

    $k_username = htmlspecialchars(trim($_POST["txtusername"] ?? ''));
    $k_password = trim($_POST["txtpassword"] ?? '');

    try {
        $modelousuario = new modelusuario();
        $user = $modelousuario->obteberUsuarioNombre($k_username);

        if (!$user) {
            echo json_encode([
                'success' => false,
                'message' => 'El usuario no existe.',
                'redirect' => get_views('claveequivocada.php')
            ]);
            exit;
        }

        if ($k_password === $user['password']) { // Comparación directa
            $_SESSION["txtusername"] = $k_username;

            echo json_encode([
                'success' => true,
                'redirect' => get_controlers('controladordashboard.php')
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Usuario o contraseña incorrectos.',
                'redirect' => get_views('claveequivocada.php')
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Ocurrió un error inesperado. Inténtalo nuevamente.'
        ]);
    }
    exit;
} else {
    include get_views_disc('vistalogin.php');
}
