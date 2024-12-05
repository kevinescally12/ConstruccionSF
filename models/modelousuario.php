<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';

//al insatanciar la clase debo de obtener la conexion, 

class modelusuario
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    //debe de haber un metodo para hacer un select

    public function obtenerUsuarios()
    {
        $query = $this->conexion->query('select id,username,password,perfil from usuarios');
        return $query->fetchALL(PDO::FETCH_ASSOC);
    }

    //debe de haber un metodo para hacer un insert

    public function insertarUsuario($username, $password, $perfil)
    {
        $query = 'insert into usuarios(username,password,perfil) values (:username, :password, :perfil)';
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        return $stmt->execute();
    }

    //debe de haber un metodo para hacer un delete

    public function eliminarUsuario($username)
    {
        $query = 'delete from usuarios where username = :username';
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    }

    //debe de haber un metodo para hacer un update

    public function modificarUsuario($id, $username, $password, $perfil)
    {
        $query = 'update usuarios set username = :username, password = :password, perfil = :perfil where id = :id';

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);
        return $stmt->execute();
    }
    
    public function obteberUsuarioNombre($username)
    {
        $query = 'select id, username, password, perfil from usuarios where username = :username';
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function validarusuario($username,$password){
        $query = "select id, perfil from usuarios where username = :username and password = :password";
        $stmt =$this->conexion->prepare($query);
        $stmt->bindparam(':username',$username);
        $stmt->bindparam(':password',$password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
