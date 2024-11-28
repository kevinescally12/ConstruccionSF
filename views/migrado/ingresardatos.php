<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "hay un post de datos <br>";
    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION["txtusername"])) {
        header('Location:' . get_urlBase('index.php'));
        exit();
    }

    $conexion = new conexion($host, $namedb, $userdb, $passworddb);
    $pdo = $conexion->obtenerconexion();
    try {
        // Cambié "usuario" a "username" para que coincida con tu tabla
        $sentencia = $pdo->prepare("INSERT INTO usuarios (username, password, perfil) VALUES (?, ?, ?)");
        $sentencia->execute([$tmpdatusuario, $tmpdatpassword, $tmpdatperfil]);
        echo "¡Usuario registrado con éxito!<br>";
    } catch (PDOException $e) {
        echo "Error al registrar usuario: " . $e->getMessage();
    }
    exit();
}
?>

<form action="" method="POST">
    <label for="datusuario">Usuario</label>
    <input type="text" name="datusuario" id="datusuario" required>
    <br>
    <label for="datpassword">Password</label>
    <input type="password" name="datpassword" id="datpassword" required>
    <br>
    <label for="datperfil">Perfil</label>
    <input type="text" name="datperfil" id="datperfil" required>
    <br>
    <button type="submit">Registrar</button>
</form>