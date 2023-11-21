<?php
    session_start();
    $dbhost = "localhost"; // Host donde esta la base de datos
    $dbname = "cineplus"; // nombre de BD
    $dbuser = "root"; // user name
    $dbpass = "";

    $nombreP = $_POST["nombreP"];
    $sinopsis = $_POST["sinopsisText"];
    $actor1 = $_POST["actor1"];
    $actor2 = $_POST["actor2"];
    $actor3 = $_POST["actor3"];
    $actor4 = $_POST["actor4"];
    $actor5 = $_POST["actor5"];
    $actor6 = $_POST["actor6"];
    $actor7 = $_POST["actor7"];
    $actor8 = $_POST["actor8"];
    $actor9 = $_POST["actor9"];
    $genero1 = $_POST["genero1"];
    $genero2 = $_POST["genero2"];
    $genero3 = $_POST["genero3"];
    $activo = $_SESSION['activoAd'];

    if($nombre != "" && $apellidoMaterno != "" && $apellidoPaterno != "" && $edad != ""){
        $sql = "INSERT INTO `peliculas`(`idP`, `nombreP`, `sinopsisText`, `actor1`, `actor2`, `actor3`, `actor4`, `actor5`, `actor6`, `actor7`, 
        `actor8`, `actor9`, `genero1`, `genero2`, `genero3`, `activoP`) VALUES('NULL', '$nombreP', '$sinopsis', '$actor1', '$actor2', '$actor3', '$actor4', 
        '$actor5', '$actor6', '$actor7', '$actor8', '$actor9', '$genero1', '$genero2', '$genero3', '$activo');";
        $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);
    header("location: ../indice.php");
    }
?>