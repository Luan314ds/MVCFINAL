<?php
function verificar($res){
    if ($res->usuarios) {
        return;
    }else{ ///////////////////////////////////////////////DESPUES LE PREGUNTAMOS AL SEÑOR
        header('Location: ' . BASE_URL .'formLogin');
        die();
    }
}
    

?>