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
        $query =
            $this->conexion->query('insert into usuarios(username,password,perfil) values (:username, :password, :perfil');
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam('username', $username);
        $stmt->bindParam('password', $password);
        $stmt->bindParam('perfil', $perfil);
        return $stmt->execute();
    }
    //debe de haber un metodo para hacer un delete

    

    //debe de haber un metodo para hacer un update
}
