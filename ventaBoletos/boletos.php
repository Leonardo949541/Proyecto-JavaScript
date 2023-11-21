<?php
    session_start();

    $idSesion = session_id();

    // Obtener cantidad de boletos ya comprados y registrados en la base de datos;
    $dbhost = "localhost"; // Host donde esta la base de datos
    $dbname = "cineplus"; // nombre de BD
    $dbuser = "root"; // user name
    $dbpass = "";




    /*$conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
    $sqlCantidadBole = mysqli_query($conexion, "SELECT SUM(`cantBoletos`) FROM `cliente`"); // Consulta para el número de boletos en total
    mysqli_close($conexion);                                                                // en la base de datos ya comprados
    $result = mysqli_fetch_array($sqlCantidadBole);
    $_SESSION["cantidadBoletos"] = $result[0]; // tamaño del arreglo

    $arreglo = array($sqlCantidadBole); // Inicializar arreglo con el número total de boletos en base de datos

    for($i=0; $i<$_SESSION["cantidadBoletos"]; $i++){
        $arreglo[$i] = $t++;
        echo $arreglo[$i];
    }

    exit();*/




    // Consulta para saber los boletos que ya fueron comprados en base de datos, y para determinar el tamaño del arreglo
    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
    $sqlNumAsientos = mysqli_query($conexion, "SELECT `asiento` FROM `boletos`");
    $sqlCantidadBole = mysqli_query($conexion, "SELECT SUM(`cantBoletos`) FROM `boletos`"); // Consulta para el número de boletos en total                                                               // en la base de datos ya comprados
    $result = mysqli_fetch_array($sqlCantidadBole);
    mysqli_close($conexion);
    $result2 = array($result);
    $result3 = array($result);

    for($o=0; $result2 != ""; $o++){
        $result2 = mysqli_fetch_row($sqlNumAsientos);
        if($result2 == "")
            break;
        else{
        $result3[$o] = $result2[0];
        $_SESSION["cantBoletosCom"] = $o+1;
        }
    }



    /*for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
        echo $result3[$i];
    }*/



    $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3




    // Una pruebita para saber si se almacenan los elementos del arreglo en la variable $_SESSION["BoletosComprados"]
    /*for($u=0; $u<$_SESSION["cantBoletosCom"]; $u++){
        if($_SESSION["BoletosComprados"][$u] == "A1"){
            echo "ei";
        }else{
            if($_SESSION["BoletosComprados"][$u] == "A4"){
                echo "ei2";
            }else{
                if($_SESSION["BoletosComprados"][$u] == "A8"){
                    echo "ei3";
                }else{
                    if($_SESSION["BoletosComprados"][$u] == "B2"){
                        echo "ei4";
                    }else{
                        echo "sus";
                    }
                }
            }
        }
    }*/

    //exit();

    /*for($t=0; $t<4; $t++){
        $_SESSION["a"."$t"."c"] = $t;
    }

        echo $_SESSION["a0c"];
        echo $_SESSION["a1c"];
        echo $_SESSION["a2c"];
        echo $_SESSION["a3c"];
    exit();*/





    // Obtener cantidad de boletos del usuario actual en la base de datos ya comprados
    $sql = array(0);
    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
    $sqlCantiBol = mysqli_query($conexion, "SELECT `cantBoletos` from `cliente` where `activo` = '$idSesion'");
    $sql = mysqli_fetch_array($sqlCantiBol);
    mysqli_close($conexion);
    $_SESSION["cdBoletos"] = $sql[0];  // $_SESSION["cdBoletos"] almacena el total de boletos de la sesión actual

    if($sql[0] == ""){
        $sql[0] = $_SESSION["cantidadB"];
        $_SESSION["cdBoletos"] = $sql[0];
    }

    if($sql[0] == 1 && !isset($_SESSION["bolA"])){
        $_SESSION["as1"] = 0;
        $_SESSION["bolA"] = 1;
    }else{
        if($sql[0] == 2 && !isset($_SESSION["bolA"])){
            $_SESSION["as1"] = 0;
            $_SESSION["as2"] = 0;
            $_SESSION["bolA"] = 1; // Sirve para validar que ya no necesita crear las variables para almacenar los boletos
        }else{
            if($sql[0] == 3 && !isset($_SESSION["bolA"])){
                $_SESSION["as1"] = 0;
                $_SESSION["as2"] = 0;
                $_SESSION["as3"] = 0;
                $_SESSION["bolA"] = 1;
            }else{
                if($sql[0] == 4 && !isset($_SESSION["bolA"])){
                    $_SESSION["as1"] = 0;
                    $_SESSION["as2"] = 0;
                    $_SESSION["as3"] = 0;
                    $_SESSION["as4"] = 0;
                    $_SESSION["bolA"] = 1;
                }else{
                    if($sql[0] == 5 && !isset($_SESSION["bolA"])){
                        $_SESSION["as1"] = 0;
                        $_SESSION["as2"] = 0;
                        $_SESSION["as3"] = 0;
                        $_SESSION["as4"] = 0;
                        $_SESSION["as5"] = 0;
                        $_SESSION["bolA"] = 1;
                    }else{
                        if($sql[0] == 6 && !isset($_SESSION["bolA"])){
                            $_SESSION["as1"] = 0;
                            $_SESSION["as2"] = 0;
                            $_SESSION["as3"] = 0;
                            $_SESSION["as4"] = 0;
                            $_SESSION["as5"] = 0;
                            $_SESSION["as6"] = 0;
                            $_SESSION["bolA"] = 1;
                        }
                    }
                }
            }
        }
    }


    $k = 1;
    $m = "a";

    // Es cuando el usuario selecciona el asiento
    for($n=1; $n<177; $n++){
        if($k == 17){
            $k = 1;
            $m++;
        }
            $l = strtoupper($m);
    if(isset($_POST["$l"."$k"]) && $_POST["$l"."$k"] == "$l"."$k"){
        if(isset($_SESSION["$m"."$k"."c"]) && $_SESSION["$m"."$k"."c"] == 2){
            header("location: ../asientos funcion.php");
        }else{
        // Validar el color (si esta o no seleccionado el asiento A1)
        if(isset($_SESSION["$m"."$k"."c"]) && $_SESSION["$m"."$k"."c"] == 0){
            $_SESSION["$m"."$k"."c"] = 1;
        }else{
            if(isset($_SESSION["$m"."$k"."c"]) && $_SESSION["$m"."$k"."c"] == 1){
                $_SESSION["$m"."$k"."c"] = 0;
        }else{
            $_SESSION["$m"."$k"."c"] = 1;
            }
        }

        if($sql[0] == 1){
            if($_SESSION["$m"."$k"."c"] == 0){
                $_SESSION["as1"] = 0;
            }else{
                $as1 = $_SESSION["as1"];
                $as1 = strtolower($as1);

                $_SESSION["$as1"."c"] = 0;
                $_SESSION["as1"] = "$l"."$k";
                }
        }else{
            if($sql[0] == 2){ // Validar si alguna de las variables as1,2,3,etc... contienen el A1 (asiento 1)
                if($_SESSION["$m"."$k"."c"] == 0){
                    if($_SESSION["as1"] == "$l"."$k")
                    $_SESSION["as1"] = 0;
                    else{
                        if($_SESSION["as2"] == "$l"."$k")
                        $_SESSION["as2"] = 0;
                    }
                }else{
                    if($_SESSION["$m"."$k"."c"] == 1){
                        if($_SESSION["as1"] == 0)
                        $_SESSION["as1"] = "$l"."$k";
                        else{
                            if($_SESSION["as2"] == 0)
                            $_SESSION["as2"] = "$l"."$k";
                            else{
                                $as1 = $_SESSION["as1"];
                                $as1 = strtolower($as1);

                                $_SESSION["$as1"."c"] = 0;
                                $_SESSION["as1"] = "$l"."$k";
                            }
                        }
                    }
                }
        }else{
            if($sql[0] == 3){
                if($_SESSION["$m"."$k"."c"] == 0){
                    if($_SESSION["as1"] == "$l"."$k")
                    $_SESSION["as1"] = 0;
                    else{
                        if($_SESSION["as2"] == "$l"."$k")
                        $_SESSION["as2"] = 0;
                        else{
                            if($_SESSION["as3"] == "$l"."$k")
                            $_SESSION["as3"] = 0;
                        }
                    }
                }else{
                    if($_SESSION["$m"."$k"."c"] == 1){
                        if($_SESSION["as1"] == 0)
                        $_SESSION["as1"] = "$l"."$k";
                        else{
                            if($_SESSION["as2"] == 0)
                            $_SESSION["as2"] = "$l"."$k";
                            else{
                                if($_SESSION["as3"] == 0)
                                $_SESSION["as3"] = "$l"."$k";
                                else{ 
                                    $as1 = $_SESSION["as1"];
                                    $as1 = strtolower($as1);
    
                                    $_SESSION["$as1"."c"] = 0;
                                    $_SESSION["as1"] = "$l"."$k";
                                }
                            }
                        }
                    }
                }
            }else{
                if($sql[0] == 4){
                    if($_SESSION["$m"."$k"."c"] == 0){
                        if($_SESSION["as1"] == "$l"."$k")
                        $_SESSION["as1"] = 0;
                        else{
                            if($_SESSION["as2"] == "$l"."$k")
                            $_SESSION["as2"] = 0;
                            else{
                                if($_SESSION["as3"] == "$l"."$k")
                                $_SESSION["as3"] = 0;
                                else{
                                    if($_SESSION["as4"] == "$l"."$k")
                                    $_SESSION["as4"] = 0;
                                }
                            }
                        }
                    }else{
                        if($_SESSION["$m"."$k"."c"] == 1){
                            if($_SESSION["as1"] == 0)
                            $_SESSION["as1"] = "$l"."$k";
                            else{
                                if($_SESSION["as2"] == 0)
                                $_SESSION["as2"] = "$l"."$k";
                                else{
                                    if($_SESSION["as3"] == 0)
                                    $_SESSION["as3"] = "$l"."$k";
                                    else{
                                        if($_SESSION["as4"] == 0)
                                        $_SESSION["as4"] = "$l"."$k";
                                        else{
                                            $as1 = $_SESSION["as1"];
                                            $as1 = strtolower($as1);
            
                                            $_SESSION["$as1"."c"] = 0;
                                            $_SESSION["as1"] = "$l"."$k";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }else{
                    if($sql[0] == 5){
                        if($_SESSION["$m"."$k"."c"] == 0){
                            if($_SESSION["as1"] == "$l"."$k")
                            $_SESSION["as1"] = 0;
                            else{
                                if($_SESSION["as2"] == "$l"."$k")
                                $_SESSION["as2"] = 0;
                                else{
                                    if($_SESSION["as3"] == "$l"."$k")
                                    $_SESSION["as3"] = 0;
                                    else{
                                        if($_SESSION["as4"] == "$l"."$k")
                                        $_SESSION["as4"] = 0;
                                        else{
                                            if($_SESSION["as5"] == "$l"."$k")
                                            $_SESSION["as5"] = 0;
                                        }
                                    }
                                }
                            }
                        }else{
                            if($_SESSION["$m"."$k"."c"] == 1){
                                if($_SESSION["as1"] == 0)
                                $_SESSION["as1"] = "$l"."$k";
                                else{
                                    if($_SESSION["as2"] == 0)
                                    $_SESSION["as2"] = "$l"."$k";
                                    else{
                                        if($_SESSION["as3"] == 0)
                                        $_SESSION["as3"] = "$l"."$k";
                                        else{
                                            if($_SESSION["as4"] == 0)
                                            $_SESSION["as4"] = "$l"."$k";
                                            else{
                                                if($_SESSION["as5"] == 0)
                                                $_SESSION["as5"] = "$l"."$k";
                                                else{
                                                    $as1 = $_SESSION["as1"];
                                                    $as1 = strtolower($as1);
                                                    
                                                    $_SESSION["$as1"."c"] = 0;
                                                    $_SESSION["as1"] = "$l"."$k";
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        if($sql[0] == 6){
                            if($_SESSION["$m"."$k"."c"] == 0){
                                if($_SESSION["as1"] == "$l"."$k")
                                $_SESSION["as1"] = 0;
                                else{
                                    if($_SESSION["as2"] == "$l"."$k")
                                    $_SESSION["as2"] = 0;
                                    else{
                                        if($_SESSION["as3"] == "$l"."$k")
                                        $_SESSION["as3"] = 0;
                                        else{
                                            if($_SESSION["as4"] == "$l"."$k")
                                            $_SESSION["as4"] = 0;
                                            else{
                                                if($_SESSION["as5"] == "$l"."$k")
                                                $_SESSION["as5"] = 0;
                                                else{
                                                    if($_SESSION["as6"] = "$l"."$k")
                                                    $_SESSION["as6"] = 0;
                                                }
                                            }
                                        }
                                    }
                                }
                            }else{
                                if($_SESSION["$m"."$k"."c"] == 1){
                                    if($_SESSION["as1"] == 0)
                                    $_SESSION["as1"] = "$l"."$k";
                                    else{
                                        if($_SESSION["as2"] == 0)
                                        $_SESSION["as2"] = "$l"."$k";
                                        else{
                                            if($_SESSION["as3"] == 0)
                                            $_SESSION["as3"] = "$l"."$k";
                                            else{
                                                if($_SESSION["as4"] == 0)
                                                $_SESSION["as4"] = "$l"."$k";
                                                else{
                                                    if($_SESSION["as5"] == 0)
                                                    $_SESSION["as5"] = "$l"."$k";
                                                    else{
                                                        if($_SESSION["as6"] == 0)
                                                        $_SESSION["as6"] = "$l"."$k";
                                                        else{
                                                            $as1 = $_SESSION["as1"];
                                                            $as1 = strtolower($as1);
                            
                                                            $_SESSION["$as1"."c"] = 0;
                                                            $_SESSION["as1"] = "$l"."$k";
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
    header("location: ../asientos funcion.php");
    break;
    }
}else
    $k++;
}
?>