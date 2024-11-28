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

        $marca = $_GET['marca'];
        $modelo = $_GET['modelo'];
        $año = $_GET['año'];


        $id = $this->model->Insert($marca, $modelo, $año);

        if ($id) {
            header('Location:'. BASE_URL . 'vehiculos');
        } else {
            $this->view->error();
        }
    }
}
?>