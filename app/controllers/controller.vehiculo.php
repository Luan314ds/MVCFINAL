<?php

require_once "./app/models/model_vehiculo.php";
require_once "./app/views/view_vehiculo.php";

class ControllerVehiculos{
     
    private $model;
    private $view;

    public function __construct()
    {
       $this->model = new VehiculoModel;
       $this->view = new ViewVehiculo;
    }

    public function getAllcontroller(){

        $vehiculos = $this->model->getAll();

        return $this->view->mostrarVehi($vehiculos);

        
    }

    public function insertcontroller(){

        if(!isset($_GET['marca']) || empty($_GET['marca'])){
            return $this->view->mostrarError('Falta completar marca');
            die();
        }
        if(!isset($_GET['modelo']) || empty($_GET['modelo'])){
            return $this->view->mostrarError('Falta completar modelo');
            die();
        }
        if(!isset($_GET['año']) || empty($_GET['año'])){
            return $this->view->mostrarError('Falta completar año');
            die();
        }

        $marca = $_GET['marca'];
        $modelo = $_GET['modelo'];
        $año = $_GET['año'];


        $id = $this->model->Insert($marca, $modelo, $año);

        if ($id) {
            header('Location:'. BASE_URL . 'vehiculos');
            exit;
        } else {
            return $this->view->mostrarError("Id del vehiculo no existe");
        }
    }
}
?>