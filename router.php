<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once "./app/controllers/controller.vehiculo.php";
require_once "./app/controllers/controller.services.php";


require_once "./libs/response.php";

require_once "./app/middlewares/leerSesion.php";
require_once "./app/middlewares/mandarteLogin.php";

$res = new Response;


if (!empty($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "inicio";
}

$params = explode("/", $action);

switch ($params[0]) {
    case 'vehiculos':
            $controller = new ControllerVehiculos();
            $controller->getAllcontroller($params[0]);
        break;

        case 'services':
            $controller = new ControllerServices();
            $controller->mostrar($params[0]);
        break;
        case 'form':
            $controller = new ControllerVehiculos();
            $controller->insertcontroller($params[0]);
        break;

        case 'formservice':
            $controller = new ControllerServices();
            $controller->insert($params[0]);
        break;

    default:
        # code...
        break;
}
