<?php
require_once "./config.php";

class ServiceModel{

 
    private $db;

    function __construct(){
        $this->db = $this-> ObtenerConexion();
    }
    
    private function ObtenerConexion() {
        $db = new PDO('mysql:host=localhost;dbname=concesionaria;charset=utf8', 'root', '');
        return $db;
    }

    public function getAll(){
        $query = $this->db->prepare('SELECT * FROM services');
        $query->execute();

       return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($id_vehiculo, $id_mecanico, $fecha, $kilometraje){
        $query = $this->db->prepare('INSERT INTO services(id_vehiculo, id_mecanico, fecha, kilometraje) VALUES(?, ?, ?, ?)');
        $query->execute([$id_vehiculo, $id_mecanico, $fecha, $kilometraje]);

       return $this->db->lastInsertId();
    }

    public function existevehiculo($id){
        $query = $this->db->prepare('SELECT * FROM vehiculo WHERE id = ?');
        $query->execute([$id]);

       
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>