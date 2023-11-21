<?php
    session_start();
function cantBoletos(){
if(isset($_POST["botonAdulto"])  ||  isset($_POST["botonMayor"])  ||  isset($_POST["botonMenor"])){
    $cant = $_POST["cantBoletos"];
    $cant2 = $_POST["cantBoletos2"];
    $cant3 = $_POST["cantBoletos3"];
    $_SESSION["cantAd"] = $_POST["cantBoletos"];
    $_SESSION["cantMa"] = $_POST["cantBoletos2"];
    $_SESSION["cantMe"] = $_POST["cantBoletos3"];
    if($cant == '0' &&  $cant2 == '0'  &&  $cant3 == '0'){
       if($_POST["botonAdulto"] == 'Seleccionar'  ||  $_POST["botonMayor"] == 'Seleccionar'  ||  $_POST["botonMenor"] == 'Seleccionar'){
        header("location: ../boletos funcion.html");
       }
    }else{
    $total = $cant + $cant2 + $cant3;
    if($cant == "0"  &&  $cant2 > "0"  &&  $cant3 > "0"  &&  $total < 7){
        if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
            // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
            $dbhost = "localhost"; // Host donde esta la base de datos
            $dbname = "cineplus"; // nombre de BD
            $dbuser = "root"; // user name
            $dbpass = "";
        
            $activo = $_SESSION['activo'];
            $nombre = $_SESSION["nombre"];
            $cantidadB = 0;
            $numeroAs = 0;
        
            if($nombre != null){
                $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                mysqli_query($conexion, $sql);
                mysqli_close($conexion);
            }else{
                $_SESSION['cantidadB'] = $total;
            }
            header("location: ../asientos funcion.php");
            }
    }else{
        if($cant > "0"  &&  $cant2 == "0"  &&  $cant3 > "0"  &&  $total < 7){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
            // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
            $dbhost = "localhost"; // Host donde esta la base de datos
            $dbname = "cineplus"; // nombre de BD
            $dbuser = "root"; // user name
            $dbpass = "";
        
            $activo = $_SESSION['activo'];
            $nombre = $_SESSION["nombre"];
            $cantidadB = 0;
            $numeroAs = 0;
        
            if($nombre != null){
                $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                mysqli_query($conexion, $sql);
                mysqli_close($conexion);
            }else{
                $_SESSION['cantidadB'] = $total;
            }
            header("location: ../asientos funcion.php");
            }
    }else{
        if($cant > "0"  &&  $cant2 > "0"  &&  $cant3 == "0"  &&  $total < 7){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
                // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";
            
                $activo = $_SESSION['activo'];
                $nombre = $_SESSION["nombre"];
                $cantidadB = 0;
                $numeroAs = 0;
            
                if($nombre != null){
                    $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                    mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                }else{
                    $_SESSION['cantidadB'] = $total;
                }
                header("location: ../asientos funcion.php");
                }
    }else{
        if($cant == null  &&  $cant2 > "0"  &&  $cant3 > "0"  &&  $total < 7){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
                // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";
            
                $activo = $_SESSION['activo'];
                $nombre = $_SESSION["nombre"];
                $cantidadB = 0;
                $numeroAs = 0;
            
                if($nombre != null){
                    $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                    mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                }else{
                    $_SESSION['cantidadB'] = $total;
                }
                header("location: ../asientos funcion.php");
                }
    }else{
        if($cant == null  &&  $cant2 == null  &&  $cant3 > "0"  &&  $total < 7){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
                // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";
            
                $activo = $_SESSION['activo'];
                $nombre = $_SESSION["nombre"];
                $cantidadB = 0;
                $numeroAs = 0;
            
                if($nombre != null){
                    $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                    mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                }else{
                    $_SESSION['cantidadB'] = $total;
                }
                header("location: ../asientos funcion.php");
                }
    }else{
        if($cant > "0"  &&  $cant2 == null  &&  $cant3 > "0"  &&  $total < 7){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
                // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";
            
                $activo = $_SESSION['activo'];
                $nombre = $_SESSION["nombre"];
                $cantidadB = 0;
                $numeroAs = 0;
            
                if($nombre != null){
                    $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                    mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                }else{
                    $_SESSION['cantidadB'] = $total;
                }
                header("location: ../asientos funcion.php");
                }
    }else{
        if($cant > "0"  &&  $cant2 == null  &&  $cant3 == null  &&  $total < 7){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
                // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";
            
                $activo = $_SESSION['activo'];
                $nombre = $_SESSION["nombre"];
                $cantidadB = 0;
                $numeroAs = 0;
            
                if($nombre != null){
                    $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                    mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                }else{
                    $_SESSION['cantidadB'] = $total;
                }
                header("location: ../asientos funcion.php");
                }
    }else{
        if($cant > "0"  &&  $cant2 > "0"  &&  $cant3 == null  &&  $total < 7){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
                // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";
            
                $activo = $_SESSION['activo'];
                $nombre = $_SESSION["nombre"];
                $cantidadB = 0;
                $numeroAs = 0;
            
                if($nombre != null){
                    $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                    mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                }else{
                    $_SESSION['cantidadB'] = $total;
                }
                header("location: ../asientos funcion.php");
                }
    }else{
        if($cant == null  &&  $cant2 > "0"  &&  $cant3 == null  &&  $total < 7){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
                // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";
            
                $activo = $_SESSION['activo'];
                $nombre = $_SESSION["nombre"];
                $cantidadB = 0;
                $numeroAs = 0;
            
                if($nombre != null){
                    $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                    mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                }else{
                    $_SESSION['cantidadB'] = $total;
                }
                header("location: ../asientos funcion.php");
                }
    }else{
        if($cant > "0"  &&  $cant2 > "0"  &&  $cant3 > "0"  &&  $total < 7){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar"){
                // Actualizar registro en caso de que exista en la base de datos, sino se crea una variable sesion para guardar la cantidad de boletos
                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";
            
                $activo = $_SESSION['activo'];
                $nombre = $_SESSION["nombre"];
                $cantidadB = 0;
                $numeroAs = 0;
            
                if($nombre != null){
                    $sql = "UPDATE `cliente` SET `cantBoletos` = '$total' WHERE `cliente`.`activo` = '$activo';";
                    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                    mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                }else{
                    $_SESSION['cantidadB'] = $total;
                }
                header("location: ../asientos funcion.php");
                }
    }else{
        if($cant == null  &&  $cant2 == null  &&  $cant3 == null){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar")
            header("location: ../boletos funcion.html");
    }else{
        if($cant == null  &&  $cant2 > "0"  &&  $cant3 > "0"  &&  $total > 6){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar")
            header("location: ../boletos funcion.html");       
    }else{
        if($cant > "0"  &&  $cant2 == null  &&  $cant3 > "0"  &&  $total > 6){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar")
            header("location: ../boletos funcion.html");
    }else{
        if($cant > "0"  &&  $cant2 > "0"  &&  $cant3 == null  &&  $total > 6){
            if($_POST["botonAdulto"] == "Seleccionar"  ||  $_POST["botonMayor"] == "Seleccionar"  ||  $_POST["botonMenor"] == "Seleccionar")
            header("location: ../boletos funcion.html");
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}else
    $cant = 0;
}
?>