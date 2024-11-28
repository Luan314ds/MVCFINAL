<?php
require_once "./config.php";

class UsuariosModel
{


    private $db;

    function __construct()
    {
        $this->db = $this->ObtenerConexion();
    }

    private function ObtenerConexion()
    {
        $db = new PDO('mysql:host=localhost;dbname=concesionaria;charset=utf8', 'root', '');
        return $db;
    }

    
    public function getAll($nombre)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE nombre = ?');
        $query->execute([$nombre]);


        return $query->fetch(PDO::FETCH_OBJ);
    }
}
