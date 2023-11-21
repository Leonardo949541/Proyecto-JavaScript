<?php
    session_start();
    function DefPagInSesion(){
        $pag = 0;
        $pag = $_POST["inicio"];
        if($pag == "Iniciar Sesión"){
            header("location: ../inicio sesion.html");
        }
    }

?>