<?php

class ViewVehiculo
{

    function mostrarVehi($vehiculos)
    {
        require_once "./tem/formaddvehiculo.phtml";
        require_once "./tem/listavehiculos.phtml";
    }


    function error()
    {
        echo "meeeee";
    }
}
