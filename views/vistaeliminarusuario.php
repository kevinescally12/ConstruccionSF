<?php
function mostrarFormularioEliminar($mensaje = ''){

    if (!empty($mensaje)){
        echo $mensaje;
    } else {

?>

<form action="/controlers/controladoreliminarusuario.php" method="POST">
    <label for="datusuario">Eliminar Personas</label>
    <input type="text" name="datusuario" id="datusuario" required autocomplete="off">
    <br>
    <button type="submit">Eliminar</button>
</form>

<?php
    }
}
?>