<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/conexion.php';


$host = "localhost";
$namedb = "dbsistema";
$userdb = "root";
$passwordb = "";

$tempdbusername = '';
$fila = null;

$conexion = new conexion($host, $namedb, $userdb, $passwordb);
$pdo = $conexion->obtenerconexion();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] === "buscar") {
    if (!empty($_POST["dbusername"])) {
        $tempdbusername = $_POST["dbusername"];

        $query = $pdo->prepare("SELECT id, username, password, perfil FROM usuarios WHERE username = :username");
        $query->bindParam(':username', $tempdbusername, PDO::PARAM_STR);
        $query->execute();
        $fila = $query->fetch(PDO::FETCH_ASSOC);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] === "modificar") {
    if (!empty($_POST["dbusername"]) && !empty($_POST["dbpassword"]) && !empty($_POST["dbperfil"])) {
        $id = $_POST["id"];
        $username = $_POST["dbusername"];
        $password = $_POST["dbpassword"];
        $perfil = $_POST["dbperfil"];

        $query = $pdo->prepare("UPDATE usuarios SET username = :username, password = :password, perfil = :perfil WHERE id = :id");
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':perfil', $perfil, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);

        if ($query->execute()) {
            echo "<p>Usuario modificado correctamente.</p>";
        } else {
            echo "<p>Error al modificar el usuario.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
</head>

<body>
    <form action="" method="POST">
        <input type="hidden" name="action" value="buscar">
        <label for="dbusername">¿Qué usuario desea modificar?</label>
        <input type="text" name="dbusername" id="dbusername" required>
        <br>
        <button type="submit">Buscar Usuario</button>
    </form>

    <?php if (!empty($fila)) : ?>
        <form action="" method="POST">
            <input type="hidden" name="action" value="modificar">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($fila['id'], ENT_QUOTES, 'UTF-8'); ?>">
            
            <label for="dbusername">Usuario</label>
            <input type="text" name="dbusername" id="dbusername" value="<?php echo htmlspecialchars($fila['username'], ENT_QUOTES, 'UTF-8'); ?>" required>
            <br>
            
            <label for="dbpassword">Password</label>
            <input type="text" name="dbpassword" id="dbpassword" value="<?php echo htmlspecialchars($fila['password'], ENT_QUOTES, 'UTF-8'); ?>" required>
            <br>
            
            <label for="dbperfil">Perfil</label>
            <input type="text" name="dbperfil" id="dbperfil" value="<?php echo htmlspecialchars($fila['perfil'], ENT_QUOTES, 'UTF-8'); ?>" required>
            <br>
            
            <button type="submit">Modificar Usuario</button>
        </form>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] === "buscar") : ?>
        <p>Usuario no encontrado.</p>
    <?php endif; ?>
</body>

</html>