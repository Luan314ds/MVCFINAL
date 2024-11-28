<?php

class ViewVehiculo
{

    function mostrarVehi($vehiculos)
    {
        require_once "./tem/formaddvehiculo.phtml";
        require_once "./tem/listavehiculos.phtml";
    }


        function mostrarError($error = ''){
            require_once "tem/errorvehiculos.phtml";
        }
    
}
