<?php
function mostrarFormularioEliminar($mensaje = ''){

    if (!empty($mensaje)){
        echo $mensaje;
    } else {

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="/css/estiloeliminar.css">       
</head>
<body>
    <form action="/controlers/controladoreliminarusuario.php" method="POST">
    <div class="contenedor-eliminar">
    <div class="cuadro-eliminar">
        <img src="/img/elimnar.png" alt="Imagen de eliminar" class="imagen-eliminar">
        <form action="/controlers/controladoreliminarusuario.php" method="POST">
            <label for="datusuario" class="label-eliminar">Eliminar Personas</label>
            <input type="text" name="datusuario" id="datusuario" class="campo-nombre" placeholder="Nombre de usuario" required autocomplete="off">
            <button type="submit" class="btn-eliminar">Eliminar</button>
        </form>
    </div>
</div>

</body>
<?php
    }
}
?>