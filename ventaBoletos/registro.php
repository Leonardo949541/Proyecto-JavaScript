<?php
    session_start();
    include "../inicioSesionPage.php";
    include "inicioDeSesion.php";
    include "cantidadBoletos.php";


    // Obtener y determinar el tipo de pelicula y función
    $tipo = "";
    $funcion = "";
    $tipo = $_GET["tipoP"];
    $funcion = $_GET["funcion"];
    //$_SESSION["tipoPeli"] = urldecode($tipo);
    //$_SESSION["funciónPeli"] = urldecode($funcion);
    
    if($tipo == "Godzilla 2: El Rey de los Monstruos"){
        $_SESSION["tipoPeli"] = "Godzilla 2: El Rey de los Monstruos";
    }else{
        if($tipo == "Megadolon"){
            $_SESSION["tipoPeli"] = "Megadolon";
        }
    }

    if($funcion == "06:00 PM"){
        $_SESSION["funcionPeli"] = "06:00 PM";
    }else{
        if($funcion == "08:00 PM"){
            $_SESSION["funcionPeli"] = "08:00 PM";
        }else{
            if($funcion == "07:20 PM"){
                $_SESSION["funcionPeli"] = "07:20 PM";
            }else{
                if($funcion == "10:00 PM"){
                    $_SESSION["funcionPeli"] = "10:00 PM";
                }
            }
        }
    }

    if(isset($_GET["tipoP"]) && isset($_GET["funcion"])){
        header("location: ../boletos funcion.html");
    }



    // Mandar al usuario al formulario de iniciar sesión
    if(isset($_POST['inicio'])  &&  $_POST['inicio'] == "Iniciar Sesión")
    {
        if($_SESSION['activo'] == session_id()){
            header("location: ../indice.html");
        }else{
            DefPagInSesion();
        }
    }
    


    // Obtener los datos introducidos en los campos del form de iniciar sesión
    if(isset($_POST['iniciarS'])  &&  $_POST['iniciarS'] == "Iniciar")
        iniciarSesion();
    


    // Cerrar la sesión del usuario
    if(isset($_POST['salir'])  &&  $_POST['salir'] == "Cerrar Sesión"){
        if($_SESSION['activo'] == session_id()){
            session_destroy();
            session_regenerate_id();
            header("location: ../indice.html");
        }else{
            header("location: ../indice.html");
        }
                    /*echo'<script language="javascript">';
                    echo"alert('usted no ha iniciado sesión')";
                    echo"</script>";*/
    }



    // Obtener y determinar la cantidad de boletos seleccionados
    if(isset($_POST["botonAdulto"])  ||  $_POST['botonAdulto'] == "Seleccionar"  || isset($_POST["botonMayor"]) || 
       $_POST['botonMayor'] == "Seleccionar"  ||  isset($_POST["botonMenor"]) || $_POST['botonMenor'] == "Seleccionar"){
        cantBoletos();
    }         
?>

