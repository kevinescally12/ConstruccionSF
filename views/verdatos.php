<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["txtusername"])) {
    header('Location:' . get_urlBase('index.php'));
    exit();
}

$conexion = new conexion($host, $namedb, $userdb, $passworddb);
$pdo = $conexion->obtenerconexion();


if ($pdo) {
    $query = $pdo->query("SELECT id, username, password, perfil FROM usuarios");

    // Asegúrate de que la consulta se haya ejecutado correctamente
    if ($query) {
        echo '<table class="custom-table">';
        echo '<tr><th>id</th><th>username</th><th>password</th><th>perfil</th></tr>';
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['perfil'] . "</td>";
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "Error en la consulta SQL.";
    }
} else {
    echo "Error al conectar con la base de datos.";
}
?>


<style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table th,
    .custom-table td {
        padding: 8px;
        text-align: left;
    }

    .custom-table th {
        background-color: #f2f2f2;
    }

    .custom-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>