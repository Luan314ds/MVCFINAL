<?php

class ViewServices{

    public $usuarios = null;

    public function __construct($usuario)
    {
        $this->usuarios = $usuario;
    }


    function mostrarAll($services){
        require_once "./tem/formaddservice.phtml";
        require_once "./tem/listaservices.phtml";
    }

    function mostrarError($error = ''){
        require_once "tem/error.phtml";
    }
}
?>