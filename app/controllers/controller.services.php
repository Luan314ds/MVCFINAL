<?php
require_once "./app/models/model_service.php";
require_once "./app/views/view_services.php";


class ControllerServices{

    private $model;
    private $view;

    public function __construct()
    {
       $this->model = new ServiceModel;
       $this->view = new ViewServices;
    }

    public function mostrar(){
        $services = $this->model->getAll();

        return $this->view->mostrarAll($services);

    }

    public function insert(){
        if(!isset($_GET['id_vehiculo']) || empty($_GET['id_vehiculo'])){
            return $this->view->errorset();
            die();
        }
        if(!isset($_GET['id_mecanico']) || empty($_GET['id_mecanico'])){

        }
        if(!isset($_GET['fecha']) || empty($_GET['ifecha'])){
            
        }
        if(!isset($_GET['kilometraje']) || empty($_GET['kilometraje'])){
            
        }

        $id_vehiculo = $_GET['id_vehiculo'];
        $id_mecanico = $_GET['id_mecanico'];
        $fecha = $_GET['fecha'];
        $kilometraje = $_GET['kilometraje'];

        
            $id = $this->model->insert($id_vehiculo, $id_mecanico, $fecha, $kilometraje);

            if ($id) {
                header('Location:'. BASE_URL . 'services');
                exit;
            } else {
               return $this->view->erroragregar();
            }
        }

    }

?>