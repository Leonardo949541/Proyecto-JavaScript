<?php
    session_start();
    /**function iniciarSesAdmin(){
        if(isset($_POST["inicioAdmin1"]) && $_POST["inicioAdmin1"] == "Sesion Admin"){
            $_SESSION["activoAd"] = 1;
            header("location: ../informacion.html");
        }else{
        header("location: ../indice.html");
        }
    }

    function cerrarSesAdmin(){
        if(isset($_POST["inicioAdmin2"]) && $_POST["inicioAdmin2"] == "Cerrar Admin" && isset($_SESSION["activoAd"]) && $_SESSION["activoAd"] == 1){
            $_SESSION["activoAd"] = 0;
            session_destroy();
            header("location: ../indice.html");
        }
    }

    function resetUsersData(){
        if(isset($_POST["reset"]) && $_POST["reset"] == "ResetUD" && isset($_SESSION["activoAd"]) && $_SESSION["activoAd"] == 1){
            $dbhost = "localhost"; // Host donde esta la base de datos
            $dbname = "cineplus"; // nombre de BD
            $dbuser = "root"; // user name
            $dbpass = "";

            $sql = "TRUNCATE TABLE `cineplus`.`cliente`;";
            $sql2 = "TRUNCATE TABLE `cineplus`.`boletos`;";
            $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
            mysqli_query($conexion, $sql);
            mysqli_query($conexion, $sql2);
            mysqli_close($conexion);
        }
    }**/

    function resetUsersData2(){
        if(isset($_POST["reset"]) && $_POST["reset"] == "ResetUD"){
            $dbhost = "localhost"; // Host donde esta la base de datos
            $dbname = "cineplus"; // nombre de BD
            $dbuser = "root"; // user name
            $dbpass = "";

            $sql = "TRUNCATE TABLE `cineplus`.`cliente`;";
            $sql2 = "TRUNCATE TABLE `cineplus`.`boletos`;";
            $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
            mysqli_query($conexion, $sql);
            mysqli_query($conexion, $sql2);
            mysqli_close($conexion);
        }
        header("location: ../indice.html");
    }

    resetUsersData2();




    /**function subirPelicula(){
        if(isset($_POST["agregar"]) && $_POST["agregar"] == "Agregar Pelicula"){
        $dbhost = "localhost"; // Host donde esta la base de datos
        $dbname = "cineplus"; // nombre de BD
        $dbuser = "root"; // user name
        $dbpass = "";

        
        $image = $_FILES["portada"]["name"];
        $imgContenido = addslashes(file_get_contents($image));
    
        $nombreP = $_POST["nombreP"];
        $sinopsis = $_POST["sinopsisText"];
        $actor1 = $_POST["actor1"];
        $actor2 = $_POST["actor2"];
        $actor3 = $_POST["actor3"];
        $actor4 = $_POST["actor4"];
        $director = $_POST["director"];
        $duracion = $_POST["duracion"];
        $genero1 = $_POST["genero1"];
        $genero2 = $_POST["genero2"];
        $funcion1 = $_POST["funcion1"];
        $funcion2 = $_POST["funcion2"];
        $_SESSION["nombreP"] = $nombreP;
        $_SESSION["sinopsis"] = $sinopsis;
        $_SESSION["actor1"] = $actor1;
        $_SESSION["actor2"] = $actor2;
        $_SESSION["actor3"] = $actor3;
        $_SESSION["actor4"] = $actor4;
        $_SESSION["director"] = $director;
        $_SESSION["duracion"] = $duracion;
        $_SESSION["genero1"] = $genero1;
        $_SESSION["genero2"] = $genero2;
        $_SESSION["funcion1"] = $funcion1;
        $_SESSION["funcion2"] = $funcion2;
    
        if($nombreP != "" && $imgContenido != "" && $sinopsis != "" && $actor1 != "" && $actor2 != "" && $actor3 != "" && $actor4 != "" && $director != "" && $duracion != ""
        && $genero1 != "" && $genero2 != "" && $funcion1 != "" && $funcion2 != ""){
            $sql = "INSERT INTO `peliculas`(`idP`, `nombreP`, `portada`, `sinopsisText`, `actor1`, `actor2`, `actor3`, `actor4`, `actor5`, `director`, `duracion`, `genero1`, 
            `genero2`, `funcion1`, `funcion2`) VALUES('NULL', '$nombreP', '$imgContenido', '$sinopsis', '$actor1', '$actor2', '$actor3', '$actor4', '$director',
                                                                           '$duracion', '$genero1', '$genero2', '$funcion1', '$funcion2');";
            $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
            mysqli_query($conexion, $sql);
            mysqli_close($conexion);
            header("location: ../informacion.html");   
        //header("location: peliculas.php");
    }else{
        header("location: ../informacion.html");   
    } 
    }
    }**/


    /*$das = 1;
    //$result = $db->query("SELECT imagenes FROM images_tabla WHERE id = {$_GET['id']}");
    $result = $db->query("SELECT `portada` FROM `peliculas` WHERE `peliculas`.`id` = '$das';");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
        
        //Mostrar Imagen
        header("Content-type: image/jpg"); 
        echo $imgDatos['portada']; 
    }else{
        echo 'Imagen no existe...';
    }*/



?>