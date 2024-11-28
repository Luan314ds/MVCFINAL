<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once "./app/controllers/controller.vehiculo.php";
require_once "./app/controllers/controller.services.php";
require_once "./app/controllers/controller.auth.php";


require_once "./libs/response.php";

require_once "./app/middlewares/session.auth.php";
require_once "./app/middlewares/verify.auth.php";

$res = new Response;


if (!empty($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "vehiculos";
}

$params = explode("/", $action);

switch ($params[0]) {
    case 'vehiculos':
        if (isset($params[0])) {
            middlewaresesion($res);
            $controller = new ControllerVehiculos($res);
            $controller->getAllcontroller($params[0]);
             }
        break;

        case 'services':
            if (isset($params[0])) {
                middlewaresesion($res);
                $controller = new ControllerServices($res);
                $controller->mostrar($params[0]);
            }
        break;
        case 'form':
            middlewaresesion($res);
            $controller = new ControllerVehiculos($res);
            $controller->insertcontroller($params[0]);
        break;

        case 'formservice':
            middlewaresesion($res);
            $controller = new ControllerServices($res);
            $controller->insert($params[0]);
        break;

        case 'formLogin':
            $controller = new ControllerAuth();
            $controller->mostrar();
        break;

        case 'login':
            $controller = new ControllerAuth();
            $controller->insert();
        break;

        case 'desloguearse':
            $controller = new ControllerAuth();
            $controller->desloguearse();
        break;

    default:
        # code...
        break;
}
