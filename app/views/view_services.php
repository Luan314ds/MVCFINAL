<?php
class ViewServices{
    function mostrarAll($services){
        require_once "./tem/formaddservice.phtml";
        require_once "./tem/listaservices.phtml";
    }

    function mostrarError($error = ''){
        require_once "tem/error.phtml";
    }
}
?>