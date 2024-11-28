<?php
require_once "./app/models/model_users.php";
require_once "./app/views/view_users.php";


class ControllerAuth
{

    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new UsuariosModel;
        $this->view = new ViewUsers;
    }

    public function mostrar()
    {
        return $this->view->mostrarAll();
    }

    public function insert()
    {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->mostrarAll('Falta completar nombre');
            die();
        }
        if (!isset($_POST['contraseña']) || empty($_POST['contraseña'])) {
            return $this->view->mostrarAll('Falta completar contraseña');
            die();
        }

        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];

        $usuarioDB = $this->model->getAll($nombre);

        if ($usuarioDB && password_verify($contraseña,$usuarioDB->contraseña)) {

            session_start();

            
            $_SESSION['ID_USER'] = $usuarioDB->id_login;
            $_SESSION['NOMBRE_USER'] = $usuarioDB->nombre;
            $_SESSION['LAST_ACTIVITY'] = time(); ///////////////////////////////////////////////DESPUES LE PREGUNTAMOS AL SEÑOR

            header('Location:' . BASE_URL . 'vehiculos');
        } else {
            return $this->view->mostrarAll('Credenciales incorrectas');
            exit(); // Detenemos el flujo para evitar que se siga ejecutando
        }
    }

    public function desloguearse()
    {
        session_start();
        session_destroy();

        header('Location:' . BASE_URL . 'formLogin');
    }
}
