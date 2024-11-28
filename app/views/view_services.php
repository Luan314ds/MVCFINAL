<?php
class ViewServices{
    function mostrarAll($services, ){
        require_once "./tem/formaddservice.phtml";
        require_once "./tem/listaservices.phtml";
    }

    function errorset()
    {
        echo "no seteado";
    }

    function errorid()
    {
        echo "id no existe";
    }

    function erroragregar()
    {
        echo "nono agregado nono";
    }
}
?>