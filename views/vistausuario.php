<?php
function mostrarUsuarios($usuarios){
?>
 

    <h2>LISTA DE USUARIOS DEL SISTEMA</h2>
    <br>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Perfil</th>
            <th>Eliminar</th>
            <th>Modificar</th>
        </tr>;

        <?php
        foreach ($usuarios as $usuario) :
        ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['username'] ?></td>
                <td><?php echo str_repeat('*', strlen($usuario['password'])) ?></td>
                <td><?php echo $usuario['perfil'] ?></td>
                <td> <a href="/controlers/controladoreliminarusuario.php?username=<?php echo urlencode($usuario['username']); ?>" class="delete-link" > Eliminar</a></td>
                <td> <a href="/controlers/controladormodificarusuario.php?username=<?php echo urlencode($usuario['username']); ?>" class="btn-modificar" > Modificar</a></td>
            </tr>;

        <?php
        endforeach;
        ?>
    </table>
<?php
}
?>