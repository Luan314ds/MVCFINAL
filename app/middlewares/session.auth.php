<?php

function middlewaresesion($res)
{
    session_start();
    if (isset($_SESSION['ID_USER'])) {
        $res->usuarios = new stdClass();
        $res->usuarios->id_login = $_SESSION['ID_USER']; ///////////////////////////////////////////////DESPUES LE PREGUNTAMOS AL SEÑOR
        $res->usuarios->nombre = $_SESSION['NOMBRE_USER'];
        return;
    }
}
