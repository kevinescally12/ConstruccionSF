<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

class modelusuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    public function obtenerUsuarios()
    {
        $query = $this->conexion->query('SELECT id, username, password, perfil FROM usuarios');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarUsuario($username, $password, $perfil)
    {
        $query = 'INSERT INTO usuarios (username, password, perfil) VALUES (:username, :password, :perfil)';
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        return $stmt->execute();
    }

    public function eliminarUsuario($username)
    {
        $query = 'DELETE FROM usuarios WHERE username = :username';
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    }

    public function modificarUsuario($id, $username, $password, $perfil)
    {
        $query = 'UPDATE usuarios SET username = :username, password = :password, perfil = :perfil WHERE id = :id';
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        return $stmt->execute();
    }

    public function obteberUsuarioNombre($username)
    {
        $query = 'SELECT id, username, password, perfil FROM usuarios WHERE username = :username';
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute(); // Ejecutar la consulta
        return $stmt->fetch(PDO::FETCH_ASSOC); // Obtener un solo registro
    }
}
?>
