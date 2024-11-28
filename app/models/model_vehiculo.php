<?php
require_once "./config.php";


class VehiculoModel
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

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM vehiculo');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);

    }

    function Insert($marca, $modelo, $año){
        $query = $this->db->prepare('INSERT INTO vehiculo(marca, modelo, año) VALUES (?, ?, ?)');
        $query->execute([$marca, $modelo, $año]);

        return $this->db->lastInsertId();
    }
}
