<?php
function mostrarFormularioBusqueda($mensaje = '')
{
    if (!empty($mensaje)) {
        echo $mensaje;
        echo "<br>";
    } else {
        ?>
        <form action="/controlers/controladormodificarusuario.php" method="POST">
            <label for="datusuario">Que usuario Modificar</label>
            <input type="text" name="datusuario" id="datusuario" required autocomplete="off">
            <br>
            <button type="submit">Encontrar</button>
        </form>
        <?php
    }
}

function mostrarFormularioEdicion($usuario, $mensaje = '')
{
    ?>
    <form action="/controlers/controladormodificarusuario.php" method="POST">
        <input type="hidden" id="custId" name="custId" value="<?php echo $usuario['id'] ?>">

        <label for="datusername">Usuario</label>
        <input type="text" name="datusername" id="datusername" value="<?php echo $usuario['username'] ?>">
        <br>

        <label for="datpassword">Password</label>
        <input type="text" name="datpassword" id="datpassword" value="<?php echo $usuario['password'] ?>">
        <br>

        <label for="datperfil">Perfil</label>
        <input type="text" name="datperfil" id="datperfil" value="<?php echo $usuario['perfil'] ?>">
        <br>

        <button type="submit">Modificar Usuario</button>
    </form>
    <?php
}
?>
