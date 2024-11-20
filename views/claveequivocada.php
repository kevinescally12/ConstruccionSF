<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Contraseña</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/claveequivocada.css'); ?>">
</head>
<body>
    <h1>Te equivocaste en la contraseña</h1>
    <br><br>
    <a href="<?php echo get_urlBase('index.php'); ?>">Página de inicio</a>
</body>
</html>
