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
        foreach ($usuarios as $usuario) {
        ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['username'] ?></td>
                <td><?php echo str_repeat('*', strlen($usuario['password'])) ?></td>
                <td><?php echo $usuario['perfil'] ?></td>
                <td> <a href="#" > Eliminar</a></td>
                <td> <a href="#" > Modificar</a></td>
            </tr>;

        <?php
        }
        ?>
    </table>
<?php
}
?>