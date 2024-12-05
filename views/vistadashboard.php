<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
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
            if(isset($contenido)){
                echo $contenido;
            } else {
                echo "<h1> Bienvenido al sistema </h1>";
            }
        ?>
    </div>
</body>

</html>
