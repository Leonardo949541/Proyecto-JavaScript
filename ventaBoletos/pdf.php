<?php
    

    if(session_status() != PHP_SESSION_ACTIVE){
        session_start();

        if(!isset($_SESSION["nombre"])){
            $_SESSION["final"] = 1;
            header("location: ../inicio sesion.html");
        }else{

        $dbhost = "localhost"; // Host donde esta la base de datos
        $dbname = "cineplus"; // nombre de BD
        $dbuser = "root"; // user name
        $dbpass = "";
        
        $numeroAs = $_SESSION["numAsientos"];
        $activo = session_id();

        $sql = "UPDATE `cliente` SET `numAsientos` = '$numeroAs' WHERE `cliente`.`activo` = '$activo';";
        $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
        mysqli_query($conexion, $sql);
        mysqli_close($conexion);

        for($i=1; $i<$_SESSION["cdBoletos"]+2; $i++){
            if(isset($_SESSION["as"."$i"]) != 0){
                $as = $_SESSION["as"."$i"];
            $sql = "INSERT INTO `boletos`(`idC`, `cantBoletos`, `asiento`) VALUES('NULL', '1', '$as');";
            $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
            mysqli_query($conexion, $sql);
            }
        }
        mysqli_close($conexion);
    }

    require('../fpdf/fpdf.php');
    define('EURO', chr(128));
    $pdf = new FPDF('P', 'mm', array(95,100));
    $pdf->AddPage();

    $pdf->SetFont('Helvetica','',16);
    $pdf->Cell(60,4,'CinemexPLUS',0,1,'C');
    $pdf->Ln(2);
    $pdf->Ln(2);
    $pdf->SetFont('Helvetica','',9);
    $pdf->Cell(60,4,'Cliente: '.$_SESSION["nombre"]." ".$_SESSION["apeM"]." ".$_SESSION["apeP"],0,1,'L');
    $pdf->Cell(60,4,'Fecha: '.date("j/m/o"),0,1,'L');
    $pdf->Cell(60,4,'Pelicula: '.$_SESSION["tipoPeli"],0,1,'L');
    $pdf->Cell(60,4,'Funcion: '.$_SESSION["funcionPeli"],0,1,'L');
    $pdf->Cell(60,4,'Cantidad de boletos: '.$_SESSION["cdBoletos"],0,1,'L');
    $pdf->Cell(60,4,'Numero de asientos: '.$_SESSION["numAsientos"],0,1,'L');
    $pdf->Cell(60,4,'Cantidad a pagar: '.$_SESSION["cantAPagar"],0,1,'L');
    
    $pdf->Output('recibo.pdf','f');
    $pdf->Output('recibo.pdf','i');
    session_destroy();
    }
?>