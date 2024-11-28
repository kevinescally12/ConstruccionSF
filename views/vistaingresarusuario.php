<?php
function mostrarFormularioIngreso($mensaje)
{
    if (empty($mensaje)) {

?>

        <form action="/controlers/controladoringresarusuario.php" method="POST">
            <label for="datusuario">Usuario</label>
            <input type="text" name="datusuario" id="datusuario" required autocomplete="off">
            <br>
            <br>
            <label for="datpassword">Password</label>
            <input type="password" name="datpassword" id="datpassword" required autocomplete="off">
            <br>
            <br>
            <label for="datperfil">Perfil</label>
            <input type="text" name="datperfil" id="datperfil" required autocomplete="off">
            <br>
            <button type="submit">Registrar</button>
        </form>

<?php
    } else {
        echo $mensaje;
    }
}
?>