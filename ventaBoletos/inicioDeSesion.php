<?php
    session_start();
    function iniciarSesion(){
        if(isset($_GET["nombre"]) && $_GET["nombre"] != "" && isset($_GET["apellidoM"]) && $_GET["apellidoM"] != "" && 
           isset($_GET["apellidoP"]) && $_GET["apellidoP"] != "" && isset($_GET["edad"]) && $_GET["edad"] != ""){
            if(isset($_SESSION["final"])){
                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";
            
                $nombre = $_GET["nombre"];
                $apellidoMaterno = $_GET["apellidoM"];
                $apellidoPaterno = $_GET["apellidoP"];
                $edad = $_GET["edad"];
                $cantBoletos = $_SESSION["cdBoletos"];
                $numAS = $_SESSION["numAsientos"];
                session_regenerate_id();
                $_SESSION['activo'] = session_id();
                $activo = $_SESSION['activo'];
                $_SESSION["nombre"] = $nombre;
                $_SESSION["apeM"] = $apellidoMaterno;
                $_SESSION["apeP"] = $apellidoPaterno;
                $cantidadB = 0;
                $numeroAs = 0;
            
                if($nombre != "" && $apellidoMaterno != "" && $apellidoPaterno != "" && $edad != ""){
                    $sql = "INSERT INTO `cliente`(`idC`, `nombre`, `apellidoMaterno`, `apellidoPaterno`, `edad`, `cantBoletos`, `numAsientos`, `activo`) VALUES('NULL', '$nombre', '$apellidoMaterno', 
                                                                                                        '$apellidoPaterno', '$edad', '$cantBoletos', '$numAS', '$activo');";
                    $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                    mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                header("location: pdf.php");
            }else{
                header("location: ../inicio sesion.html");   
            } 
            }else{
            $dbhost = "localhost"; // Host donde esta la base de datos
            $dbname = "cineplus"; // nombre de BD
            $dbuser = "root"; // user name
            $dbpass = "";
        
            $nombre = $_GET["nombre"];
            $apellidoMaterno = $_GET["apellidoM"];
            $apellidoPaterno = $_GET["apellidoP"];
            $edad = $_GET["edad"];
            session_regenerate_id();
            $_SESSION['activo'] = session_id();
            $activo = $_SESSION['activo'];
            $_SESSION["nombre"] = $nombre;
            $_SESSION["apeM"] = $apellidoMaterno;
            $_SESSION["apeP"] = $apellidoPaterno;
            $cantidadB = 0;
            $numeroAs = 0;
        
            if($nombre != "" && $apellidoMaterno != "" && $apellidoPaterno != "" && $edad != ""){
                $sql = "INSERT INTO `cliente`(`idC`, `nombre`, `apellidoMaterno`, `apellidoPaterno`, `edad`, `activo`) VALUES('NULL', '$nombre', '$apellidoMaterno', 
                                                                                                       '$apellidoPaterno', '$edad', '$activo');";
                $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
                mysqli_query($conexion, $sql);
                mysqli_close($conexion);
            header("location: ../indice.html");
        }else{
            header("location: ../inicio sesion.html");   
        } 
    }  
}
}

iniciarSesion();

?>