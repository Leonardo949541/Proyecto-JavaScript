<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asientos - Cinemex Plus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/styles.css" as="style">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <header>
        <section class="contexto">
            <div class="contexto-fondo">
        <h1 class="titulo h1">Cinemex  <span>PLUS</span></h1>
        <div style="display: flex; align-items: center;">
            <h2>Torreón</h2> &nbsp; &nbsp;
            <form name="formularioI" method="post" action="ventaBoletos/registro.php">
                <input type="hidden" name="inicio12" value="inicioAsientos">  
                <input type="submit" name="inicio" value="Iniciar Sesión">
            </form>
            <form name="formularioP" method="post" action="ventaBoletos/registro.php">
                <input type="submit" name="salir" value="Cerrar Sesión">
            </form>
        </div>
            <p> Dirección: Carr. Torreón Matamoros No. 5000 Ote. Col. Provitec, Torreón, Coahuila. </p>
            <div class="HitsA"><p> Teléfono: 0155-5257-6969</p>
            <a href="hits actuales.html">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-presentation-analytics" width="56" height="56" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M9 12v-4" />
                    <path d="M15 12v-2" />
                    <path d="M12 12v-1" />
                    <path d="M3 4h18" />
                    <path d="M4 4v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-10" />
                    <path d="M12 16v4" />
                    <path d="M9 20h6" />
                </svg>
                Hits actuales</a>
            </div>
            </div>
        </section>
    </header>

    <main>
        <div class="menu-fondo">
            <nav class="menu-de-navegacion contenedor">
                <a href="indice.html">Inicio</a>
                <a href="peliculas.php">Peliculas</a>
                <a href="promociones.html">Promociones</a>
                <a href="informacion.html">Información</a>
            </nav>
        </div>

        <p style="text-align:center; font-size: 4rem" class="degE colorT tamañoTitulo"> Selecciona tus asientos</p>
        <section class="colorT alineacionCompleta">

        <div class="tamañoContenedor" style="width:965px; float:left; margin-right: 1rem;">
        <div class="texto">Pantalla</div>
        <div class="tamañoPa"><img src="img/Pantalla.png"></div>
        <div class="alineacion">
            <span id="first">A</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            
            ?>
            <button name='A1' style="padding: 0px 4px" type='submit' value='A1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A1")
                    $_SESSION["a1c"] = 2;
            }
            if(isset($_SESSION["a1c"]) && $_SESSION["a1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a1c"]) && $_SESSION["a1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a1c"]) && $_SESSION["a1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A2' style="padding: 0px 4px" type='submit' value='A2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A2")
                    $_SESSION["a2c"] = 2;
            }
            if(isset($_SESSION["a2c"]) && $_SESSION["a2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a2c"]) && $_SESSION["a2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a2c"]) && $_SESSION["a2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A3' style="padding: 0px 4px" type='submit' value='A3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A3")
                    $_SESSION["a3c"] = 2;
            }
            if(isset($_SESSION["a3c"]) && $_SESSION["a3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a3c"]) && $_SESSION["a3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a3c"]) && $_SESSION["a3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A4' style="padding: 0px 4px" type='submit' value='A4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A4")
                    $_SESSION["a4c"] = 2;
            }
            if(isset($_SESSION["a4c"]) && $_SESSION["a4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a4c"]) && $_SESSION["a4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a4c"]) && $_SESSION["a4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='A5' style="padding: 0px 4px" type='submit' value='A5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A5")
                    $_SESSION["a5c"] = 2;
            }
            if(isset($_SESSION["a5c"]) && $_SESSION["a5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a5c"]) && $_SESSION["a5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a5c"]) && $_SESSION["a5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A6' style="padding: 0px 4px" type='submit' value='A6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A6")
                    $_SESSION["a6c"] = 2;
            }
            if(isset($_SESSION["a6c"]) && $_SESSION["a6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a6c"]) && $_SESSION["a6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a6c"]) && $_SESSION["a6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A7' style="padding: 0px 4px" type='submit' value='A7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A7")
                    $_SESSION["a7c"] = 2;
            }
            if(isset($_SESSION["a7c"]) && $_SESSION["a7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a7c"]) && $_SESSION["a7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a7c"]) && $_SESSION["a7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A8' style="padding: 0px 4px" type='submit' value='A8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A8")
                    $_SESSION["a8c"] = 2;
            }
            if(isset($_SESSION["a8c"]) && $_SESSION["a8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a8c"]) && $_SESSION["a8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a8c"]) && $_SESSION["a8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A9' style="padding: 0px 4px" type='submit' value='A9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A9")
                    $_SESSION["a9c"] = 2;
            }
            if(isset($_SESSION["a9c"]) && $_SESSION["a9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a9c"]) && $_SESSION["a9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a9c"]) && $_SESSION["a9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A10' style="padding: 0px 4px" type='submit' value='A10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A10")
                    $_SESSION["a10c"] = 2;
            }
            if(isset($_SESSION["a10c"]) && $_SESSION["a10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a10c"]) && $_SESSION["a10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a10c"]) && $_SESSION["a10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A11' style="padding: 0px 4px" type='submit' value='A11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A11")
                    $_SESSION["a11c"] = 2;
            }
            if(isset($_SESSION["a11c"]) && $_SESSION["a11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a11c"]) && $_SESSION["a11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a11c"]) && $_SESSION["a11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A12' style="padding: 0px 4px" type='submit' value='A12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A12")
                    $_SESSION["a12c"] = 2;
            }
            if(isset($_SESSION["a12c"]) && $_SESSION["a12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a12c"]) && $_SESSION["a12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a12c"]) && $_SESSION["a12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='A13' style="padding: 0px 4px" type='submit' value='A13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A13")
                    $_SESSION["a13c"] = 2;
            }
            if(isset($_SESSION["a13c"]) && $_SESSION["a13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a13c"]) && $_SESSION["a13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a13c"]) && $_SESSION["a13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A14' style="padding: 0px 4px" type='submit' value='A14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A14")
                    $_SESSION["a14c"] = 2;
            }
            if(isset($_SESSION["a14c"]) && $_SESSION["a14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a14c"]) && $_SESSION["a14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a14c"]) && $_SESSION["a14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A15' style="padding: 0px 4px" type='submit' value='A15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A15")
                    $_SESSION["a15c"] = 2;
            }
            if(isset($_SESSION["a15c"]) && $_SESSION["a15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a15c"]) && $_SESSION["a15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a15c"]) && $_SESSION["a15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='A16' style="padding: 0px 4px" type='submit' value='A16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "A16")
                    $_SESSION["a16c"] = 2;
            }
            if(isset($_SESSION["a16c"]) && $_SESSION["a16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["a16c"]) && $_SESSION["a16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["a16c"]) && $_SESSION["a16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">A</span>
        </div>

        <div class="alineacion">
        <span id="first">B</span>
        <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='B1' style="padding: 0px 4px" type='submit' value='B1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B1")
                    $_SESSION["b1c"] = 2;
            }
            if(isset($_SESSION["b1c"]) && $_SESSION["b1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b1c"]) && $_SESSION["b1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b1c"]) && $_SESSION["b1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B2' style="padding: 0px 4px" type='submit' value='B2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B2")
                    $_SESSION["b2c"] = 2;
            }
            if(isset($_SESSION["b2c"]) && $_SESSION["b2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b2c"]) && $_SESSION["b2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b2c"]) && $_SESSION["b2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B3' style="padding: 0px 4px" type='submit' value='B3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B3")
                    $_SESSION["b3c"] = 2;
            }
            if(isset($_SESSION["b3c"]) && $_SESSION["b3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b3c"]) && $_SESSION["b3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b3c"]) && $_SESSION["b3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B4' style="padding: 0px 4px" type='submit' value='B4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B4")
                    $_SESSION["b4c"] = 2;
            }
            if(isset($_SESSION["b4c"]) && $_SESSION["b4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b4c"]) && $_SESSION["b4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b4c"]) && $_SESSION["b4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='B5' style="padding: 0px 4px" type='submit' value='B5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B5")
                    $_SESSION["b5c"] = 2;
            }
            if(isset($_SESSION["b5c"]) && $_SESSION["b5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b5c"]) && $_SESSION["b5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b5c"]) && $_SESSION["b5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B6' style="padding: 0px 4px" type='submit' value='B6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B6")
                    $_SESSION["b6c"] = 2;
            }
            if(isset($_SESSION["b6c"]) && $_SESSION["b6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b6c"]) && $_SESSION["b6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b6c"]) && $_SESSION["b6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B7' style="padding: 0px 4px" type='submit' value='B7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B7")
                    $_SESSION["b7c"] = 2;
            }
            if(isset($_SESSION["b7c"]) && $_SESSION["b7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b7c"]) && $_SESSION["b7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b7c"]) && $_SESSION["b7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B8' style="padding: 0px 4px" type='submit' value='B8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B8")
                    $_SESSION["b8c"] = 2;
            }
            if(isset($_SESSION["b8c"]) && $_SESSION["b8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b8c"]) && $_SESSION["b8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b8c"]) && $_SESSION["b8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B9' style="padding: 0px 4px" type='submit' value='B9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B9")
                    $_SESSION["b9c"] = 2;
            }
            if(isset($_SESSION["b9c"]) && $_SESSION["b9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b9c"]) && $_SESSION["b9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b9c"]) && $_SESSION["b9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B10' style="padding: 0px 4px" type='submit' value='B10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B10")
                    $_SESSION["b10c"] = 2;
            }
            if(isset($_SESSION["b10c"]) && $_SESSION["b10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b10c"]) && $_SESSION["b10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b10c"]) && $_SESSION["b10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B11' style="padding: 0px 4px" type='submit' value='B11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B11")
                    $_SESSION["b11c"] = 2;
            }
            if(isset($_SESSION["b11c"]) && $_SESSION["b11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b11c"]) && $_SESSION["b11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b11c"]) && $_SESSION["b11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B12' style="padding: 0px 4px" type='submit' value='B12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B12")
                    $_SESSION["b12c"] = 2;
            }
            if(isset($_SESSION["b12c"]) && $_SESSION["b12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b12c"]) && $_SESSION["b12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b12c"]) && $_SESSION["b12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='B13' style="padding: 0px 4px" type='submit' value='B13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B13")
                    $_SESSION["b13c"] = 2;
            }
            if(isset($_SESSION["b13c"]) && $_SESSION["b13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b13c"]) && $_SESSION["b13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b13c"]) && $_SESSION["b13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B14' style="padding: 0px 4px" type='submit' value='B14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B14")
                    $_SESSION["b14c"] = 2;
            }
            if(isset($_SESSION["b14c"]) && $_SESSION["b14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b14c"]) && $_SESSION["b14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b14c"]) && $_SESSION["b14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B15' style="padding: 0px 4px" type='submit' value='B15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B15")
                    $_SESSION["b15c"] = 2;
            }
            if(isset($_SESSION["b15c"]) && $_SESSION["b15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b15c"]) && $_SESSION["b15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b15c"]) && $_SESSION["b15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='B16' style="padding: 0px 4px" type='submit' value='B16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "B16")
                    $_SESSION["b16c"] = 2;
            }
            if(isset($_SESSION["b16c"]) && $_SESSION["b16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["b16c"]) && $_SESSION["b16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["b16c"]) && $_SESSION["b16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>

            </form>
            <span id="final">B</span>
        </div>
        <div class="alineacion">
            <span id="first">C</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='C1' style="padding: 0px 4px" type='submit' value='C1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C1")
                    $_SESSION["c1c"] = 2;
            }
            if(isset($_SESSION["c1c"]) && $_SESSION["c1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c1c"]) && $_SESSION["c1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c1c"]) && $_SESSION["c1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C2' style="padding: 0px 4px" type='submit' value='C2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C2")
                    $_SESSION["c2c"] = 2;
            }
            if(isset($_SESSION["c2c"]) && $_SESSION["c2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c2c"]) && $_SESSION["c2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c2c"]) && $_SESSION["c2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C3' style="padding: 0px 4px" type='submit' value='C3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C3")
                    $_SESSION["c3c"] = 2;
            }
            if(isset($_SESSION["c3c"]) && $_SESSION["c3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c3c"]) && $_SESSION["c3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c3c"]) && $_SESSION["c3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C4' style="padding: 0px 4px" type='submit' value='C4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C4")
                    $_SESSION["c4c"] = 2;
            }
            if(isset($_SESSION["c4c"]) && $_SESSION["c4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c4c"]) && $_SESSION["c4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c4c"]) && $_SESSION["c4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='C5' style="padding: 0px 4px" type='submit' value='C5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C5")
                    $_SESSION["c5c"] = 2;
            }
            if(isset($_SESSION["c5c"]) && $_SESSION["c5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c5c"]) && $_SESSION["c5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c5c"]) && $_SESSION["c5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C6' style="padding: 0px 4px" type='submit' value='C6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C6")
                    $_SESSION["c6c"] = 2;
            }
            if(isset($_SESSION["c6c"]) && $_SESSION["c6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c6c"]) && $_SESSION["c6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c6c"]) && $_SESSION["c6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C7' style="padding: 0px 4px" type='submit' value='C7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C7")
                    $_SESSION["c7c"] = 2;
            }
            if(isset($_SESSION["c7c"]) && $_SESSION["c7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c7c"]) && $_SESSION["c7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c7c"]) && $_SESSION["c7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C8' style="padding: 0px 4px" type='submit' value='C8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C8")
                    $_SESSION["c8c"] = 2;
            }
            if(isset($_SESSION["c8c"]) && $_SESSION["c8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c8c"]) && $_SESSION["c8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c8c"]) && $_SESSION["c8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C9' style="padding: 0px 4px" type='submit' value='C9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C9")
                    $_SESSION["c9c"] = 2;
            }
            if(isset($_SESSION["c9c"]) && $_SESSION["c9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c9c"]) && $_SESSION["c9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c9c"]) && $_SESSION["c9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C10' style="padding: 0px 4px" type='submit' value='C10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C10")
                    $_SESSION["c10c"] = 2;
            }
            if(isset($_SESSION["c10c"]) && $_SESSION["c10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c10c"]) && $_SESSION["c10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c10c"]) && $_SESSION["c10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C11' style="padding: 0px 4px" type='submit' value='C11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C11")
                    $_SESSION["c11c"] = 2;
            }
            if(isset($_SESSION["c11c"]) && $_SESSION["c11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c11c"]) && $_SESSION["c11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c11c"]) && $_SESSION["c11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C12' style="padding: 0px 4px" type='submit' value='C12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C12")
                    $_SESSION["c12c"] = 2;
            }
            if(isset($_SESSION["c12c"]) && $_SESSION["c12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c12c"]) && $_SESSION["c12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c12c"]) && $_SESSION["c12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='C13' style="padding: 0px 4px" type='submit' value='C13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C13")
                    $_SESSION["c13c"] = 2;
            }
            if(isset($_SESSION["c13c"]) && $_SESSION["c13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c13c"]) && $_SESSION["c13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c13c"]) && $_SESSION["c13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C14' style="padding: 0px 4px" type='submit' value='C14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C14")
                    $_SESSION["c14c"] = 2;
            }
            if(isset($_SESSION["c14c"]) && $_SESSION["c14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c14c"]) && $_SESSION["c14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c14c"]) && $_SESSION["c14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C15' style="padding: 0px 4px" type='submit' value='C15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C15")
                    $_SESSION["c15c"] = 2;
            }
            if(isset($_SESSION["c15c"]) && $_SESSION["c15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c15c"]) && $_SESSION["c15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c15c"]) && $_SESSION["c15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='C16' style="padding: 0px 4px" type='submit' value='C16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "C16")
                    $_SESSION["c16c"] = 2;
            }
            if(isset($_SESSION["c16c"]) && $_SESSION["c16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["c16c"]) && $_SESSION["c16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["c16c"]) && $_SESSION["c16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">C</span>
        </div>
        <div class="alineacion">
            <span id="first">D</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='D1' style="padding: 0px 4px" type='submit' value='D1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D1")
                    $_SESSION["d1c"] = 2;
            }
            if(isset($_SESSION["d1c"]) && $_SESSION["d1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d1c"]) && $_SESSION["d1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d1c"]) && $_SESSION["d1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D2' style="padding: 0px 4px" type='submit' value='D2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D2")
                    $_SESSION["d2c"] = 2;
            }
            if(isset($_SESSION["d2c"]) && $_SESSION["d2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d2c"]) && $_SESSION["d2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d2c"]) && $_SESSION["d2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D3' style="padding: 0px 4px" type='submit' value='D3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D3")
                    $_SESSION["d3c"] = 2;
            }
            if(isset($_SESSION["d3c"]) && $_SESSION["d3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d3c"]) && $_SESSION["d3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d3c"]) && $_SESSION["d3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D4' style="padding: 0px 4px" type='submit' value='D4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D4")
                    $_SESSION["d4c"] = 2;
            }
            if(isset($_SESSION["d4c"]) && $_SESSION["d4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d4c"]) && $_SESSION["d4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d4c"]) && $_SESSION["d4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='D5' style="padding: 0px 4px" type='submit' value='D5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D5")
                    $_SESSION["d5c"] = 2;
            }
            if(isset($_SESSION["d5c"]) && $_SESSION["d5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d5c"]) && $_SESSION["d5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d5c"]) && $_SESSION["d5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D6' style="padding: 0px 4px" type='submit' value='D6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D6")
                    $_SESSION["d6c"] = 2;
            }
            if(isset($_SESSION["d6c"]) && $_SESSION["d6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d6c"]) && $_SESSION["d6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d6c"]) && $_SESSION["d6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D7' style="padding: 0px 4px" type='submit' value='D7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D7")
                    $_SESSION["d7c"] = 2;
            }
            if(isset($_SESSION["d7c"]) && $_SESSION["d7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d7c"]) && $_SESSION["d7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d7c"]) && $_SESSION["d7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D8' style="padding: 0px 4px" type='submit' value='D8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D8")
                    $_SESSION["d8c"] = 2;
            }
            if(isset($_SESSION["d8c"]) && $_SESSION["d8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d8c"]) && $_SESSION["d8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d8c"]) && $_SESSION["d8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D9' style="padding: 0px 4px" type='submit' value='D9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D9")
                    $_SESSION["d9c"] = 2;
            }
            if(isset($_SESSION["d9c"]) && $_SESSION["d9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d9c"]) && $_SESSION["d9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d9c"]) && $_SESSION["d9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D10' style="padding: 0px 4px" type='submit' value='D10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D10")
                    $_SESSION["d10c"] = 2;
            }
            if(isset($_SESSION["d10c"]) && $_SESSION["d10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d10c"]) && $_SESSION["d10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d10c"]) && $_SESSION["d10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D11' style="padding: 0px 4px" type='submit' value='D11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D11")
                    $_SESSION["d11c"] = 2;
            }
            if(isset($_SESSION["d11c"]) && $_SESSION["d11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d11c"]) && $_SESSION["d11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d11c"]) && $_SESSION["d11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D12' style="padding: 0px 4px" type='submit' value='D12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D12")
                    $_SESSION["d12c"] = 2;
            }
            if(isset($_SESSION["d12c"]) && $_SESSION["d12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d12c"]) && $_SESSION["d12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d12c"]) && $_SESSION["d12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='D13' style="padding: 0px 4px" type='submit' value='D13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D13")
                    $_SESSION["d13c"] = 2;
            }
            if(isset($_SESSION["d13c"]) && $_SESSION["d13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d13c"]) && $_SESSION["d13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d13c"]) && $_SESSION["d13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D14' style="padding: 0px 4px" type='submit' value='D14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D14")
                    $_SESSION["d14c"] = 2;
            }
            if(isset($_SESSION["d14c"]) && $_SESSION["d14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d14c"]) && $_SESSION["d14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d14c"]) && $_SESSION["d14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D15' style="padding: 0px 4px" type='submit' value='D15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D15")
                    $_SESSION["d15c"] = 2;
            }
            if(isset($_SESSION["d15c"]) && $_SESSION["d15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d15c"]) && $_SESSION["d15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d15c"]) && $_SESSION["d15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='D16' style="padding: 0px 4px" type='submit' value='D16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "D16")
                    $_SESSION["d16c"] = 2;
            }
            if(isset($_SESSION["d16c"]) && $_SESSION["d16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["d16c"]) && $_SESSION["d16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["d16c"]) && $_SESSION["d16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">D</span>
        </div>
        <div class="alineacion">
            <span id="first">E</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='E1' style="padding: 0px 4px" type='submit' value='E1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E1")
                    $_SESSION["e1c"] = 2;
            }
            if(isset($_SESSION["e1c"]) && $_SESSION["e1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e1c"]) && $_SESSION["e1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e1c"]) && $_SESSION["e1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E2' style="padding: 0px 4px" type='submit' value='E2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E2")
                    $_SESSION["e2c"] = 2;
            }
            if(isset($_SESSION["e2c"]) && $_SESSION["e2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e2c"]) && $_SESSION["e2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e2c"]) && $_SESSION["e2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E3' style="padding: 0px 4px" type='submit' value='E3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E3")
                    $_SESSION["e3c"] = 2;
            }
            if(isset($_SESSION["e3c"]) && $_SESSION["e3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e3c"]) && $_SESSION["e3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e3c"]) && $_SESSION["e3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E4' style="padding: 0px 4px" type='submit' value='E4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E4")
                    $_SESSION["e4c"] = 2;
            }
            if(isset($_SESSION["e4c"]) && $_SESSION["e4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e4c"]) && $_SESSION["e4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e4c"]) && $_SESSION["e4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='E5' style="padding: 0px 4px" type='submit' value='E5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E5")
                    $_SESSION["e5c"] = 2;
            }
            if(isset($_SESSION["e5c"]) && $_SESSION["e5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e5c"]) && $_SESSION["e5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e5c"]) && $_SESSION["e5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E6' style="padding: 0px 4px" type='submit' value='E6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E6")
                    $_SESSION["e6c"] = 2;
            }
            if(isset($_SESSION["e6c"]) && $_SESSION["e6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e6c"]) && $_SESSION["e6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e6c"]) && $_SESSION["e6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E7' style="padding: 0px 4px" type='submit' value='E7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E7")
                    $_SESSION["e7c"] = 2;
            }
            if(isset($_SESSION["e7c"]) && $_SESSION["e7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e7c"]) && $_SESSION["e7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e7c"]) && $_SESSION["e7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E8' style="padding: 0px 4px" type='submit' value='E8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E8")
                    $_SESSION["e8c"] = 2;
            }
            if(isset($_SESSION["e8c"]) && $_SESSION["e8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e8c"]) && $_SESSION["e8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e8c"]) && $_SESSION["e8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E9' style="padding: 0px 4px" type='submit' value='E9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E9")
                    $_SESSION["e9c"] = 2;
            }
            if(isset($_SESSION["e9c"]) && $_SESSION["e9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e9c"]) && $_SESSION["e9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e9c"]) && $_SESSION["e9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E10' style="padding: 0px 4px" type='submit' value='E10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E10")
                    $_SESSION["e10c"] = 2;
            }
            if(isset($_SESSION["e10c"]) && $_SESSION["e10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e10c"]) && $_SESSION["e10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e10c"]) && $_SESSION["e10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E11' style="padding: 0px 4px" type='submit' value='E11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E11")
                    $_SESSION["e11c"] = 2;
            }
            if(isset($_SESSION["e11c"]) && $_SESSION["e11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e11c"]) && $_SESSION["e11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e11c"]) && $_SESSION["e11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E12' style="padding: 0px 4px" type='submit' value='E12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E12")
                    $_SESSION["e12c"] = 2;
            }
            if(isset($_SESSION["e12c"]) && $_SESSION["e12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e12c"]) && $_SESSION["e12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e12c"]) && $_SESSION["e12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='E13' style="padding: 0px 4px" type='submit' value='E13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E13")
                    $_SESSION["e13c"] = 2;
            }
            if(isset($_SESSION["e13c"]) && $_SESSION["e13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e13c"]) && $_SESSION["e13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e13c"]) && $_SESSION["e13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E14' style="padding: 0px 4px" type='submit' value='E14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E14")
                    $_SESSION["e14c"] = 2;
            }
            if(isset($_SESSION["e14c"]) && $_SESSION["e14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e14c"]) && $_SESSION["e14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e14c"]) && $_SESSION["e14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E15' style="padding: 0px 4px" type='submit' value='E15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E15")
                    $_SESSION["e15c"] = 2;
            }
            if(isset($_SESSION["e15c"]) && $_SESSION["e15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e15c"]) && $_SESSION["e15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e15c"]) && $_SESSION["e15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='E16' style="padding: 0px 4px" type='submit' value='E16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "E16")
                    $_SESSION["e16c"] = 2;
            }
            if(isset($_SESSION["e16c"]) && $_SESSION["e16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["e16c"]) && $_SESSION["e16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["e16c"]) && $_SESSION["e16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">E</span>
        </div>
        <div class="alineacion">
            <span id="first">F</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='F1' style="padding: 0px 4px" type='submit' value='F1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F1")
                    $_SESSION["f1c"] = 2;
            }
            if(isset($_SESSION["f1c"]) && $_SESSION["f1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f1c"]) && $_SESSION["f1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f1c"]) && $_SESSION["f1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F2' style="padding: 0px 4px" type='submit' value='F2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F2")
                    $_SESSION["f2c"] = 2;
            }
            if(isset($_SESSION["f2c"]) && $_SESSION["f2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f2c"]) && $_SESSION["f2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f2c"]) && $_SESSION["f2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F3' style="padding: 0px 4px" type='submit' value='F3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F3")
                    $_SESSION["f3c"] = 2;
            }
            if(isset($_SESSION["f3c"]) && $_SESSION["f3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f3c"]) && $_SESSION["f3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f3c"]) && $_SESSION["f3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F4' style="padding: 0px 4px" type='submit' value='F4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F4")
                    $_SESSION["f4c"] = 2;
            }
            if(isset($_SESSION["f4c"]) && $_SESSION["f4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f4c"]) && $_SESSION["f4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f4c"]) && $_SESSION["f4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='F5' style="padding: 0px 4px" type='submit' value='F5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F5")
                    $_SESSION["f5c"] = 2;
            }
            if(isset($_SESSION["f5c"]) && $_SESSION["f5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f5c"]) && $_SESSION["f5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f5c"]) && $_SESSION["f5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F6' style="padding: 0px 4px" type='submit' value='F6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F6")
                    $_SESSION["f6c"] = 2;
            }
            if(isset($_SESSION["f6c"]) && $_SESSION["f6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f6c"]) && $_SESSION["f6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f6c"]) && $_SESSION["f6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F7' style="padding: 0px 4px" type='submit' value='F7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F7")
                    $_SESSION["f7c"] = 2;
            }
            if(isset($_SESSION["f7c"]) && $_SESSION["f7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f7c"]) && $_SESSION["f7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f7c"]) && $_SESSION["f7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F8' style="padding: 0px 4px" type='submit' value='F8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F8")
                    $_SESSION["f8c"] = 2;
            }
            if(isset($_SESSION["f8c"]) && $_SESSION["f8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f8c"]) && $_SESSION["f8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f8c"]) && $_SESSION["f8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F9' style="padding: 0px 4px" type='submit' value='F9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F9")
                    $_SESSION["f9c"] = 2;
            }
            if(isset($_SESSION["f9c"]) && $_SESSION["f9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f9c"]) && $_SESSION["f9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f9c"]) && $_SESSION["f9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F10' style="padding: 0px 4px" type='submit' value='F10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F10")
                    $_SESSION["f10c"] = 2;
            }
            if(isset($_SESSION["f10c"]) && $_SESSION["f10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f10c"]) && $_SESSION["f10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f10c"]) && $_SESSION["f10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F11' style="padding: 0px 4px" type='submit' value='F11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F11")
                    $_SESSION["f11c"] = 2;
            }
            if(isset($_SESSION["f11c"]) && $_SESSION["f11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f11c"]) && $_SESSION["f11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f11c"]) && $_SESSION["f11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F12' style="padding: 0px 4px" type='submit' value='F12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F12")
                    $_SESSION["f12c"] = 2;
            }
            if(isset($_SESSION["f12c"]) && $_SESSION["f12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f12c"]) && $_SESSION["f12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f12c"]) && $_SESSION["f12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='F13' style="padding: 0px 4px" type='submit' value='F13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F13")
                    $_SESSION["f13c"] = 2;
            }
            if(isset($_SESSION["f13c"]) && $_SESSION["f13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f13c"]) && $_SESSION["f13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f13c"]) && $_SESSION["f13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F14' style="padding: 0px 4px" type='submit' value='F14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F14")
                    $_SESSION["f14c"] = 2;
            }
            if(isset($_SESSION["f14c"]) && $_SESSION["f14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f14c"]) && $_SESSION["f14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f14c"]) && $_SESSION["f14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F15' style="padding: 0px 4px" type='submit' value='F15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F15")
                    $_SESSION["f15c"] = 2;
            }
            if(isset($_SESSION["f15c"]) && $_SESSION["f15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f15c"]) && $_SESSION["f15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f15c"]) && $_SESSION["f15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='F16' style="padding: 0px 4px" type='submit' value='F16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "F16")
                    $_SESSION["f16c"] = 2;
            }
            if(isset($_SESSION["f16c"]) && $_SESSION["f16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["f16c"]) && $_SESSION["f16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["f16c"]) && $_SESSION["f16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">F</span>
        </div>
        <div class="alineacion">
            <span id="first">G</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='G1' style="padding: 0px 4px" type='submit' value='G1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G1")
                    $_SESSION["g1c"] = 2;
            }
            if(isset($_SESSION["g1c"]) && $_SESSION["g1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g1c"]) && $_SESSION["g1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g1c"]) && $_SESSION["g1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G2' style="padding: 0px 4px" type='submit' value='G2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G2")
                    $_SESSION["g2c"] = 2;
            }
            if(isset($_SESSION["g2c"]) && $_SESSION["g2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g2c"]) && $_SESSION["g2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g2c"]) && $_SESSION["g2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G3' style="padding: 0px 4px" type='submit' value='G3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G3")
                    $_SESSION["g3c"] = 2;
            }
            if(isset($_SESSION["g3c"]) && $_SESSION["g3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g3c"]) && $_SESSION["g3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g3c"]) && $_SESSION["g3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G4' style="padding: 0px 4px" type='submit' value='G4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G4")
                    $_SESSION["g4c"] = 2;
            }
            if(isset($_SESSION["g4c"]) && $_SESSION["g4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g4c"]) && $_SESSION["g4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g4c"]) && $_SESSION["g4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='G5' style="padding: 0px 4px" type='submit' value='G5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G5")
                    $_SESSION["g5c"] = 2;
            }
            if(isset($_SESSION["g5c"]) && $_SESSION["g5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g5c"]) && $_SESSION["g5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g5c"]) && $_SESSION["g5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G6' style="padding: 0px 4px" type='submit' value='G6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G6")
                    $_SESSION["g6c"] = 2;
            }
            if(isset($_SESSION["g6c"]) && $_SESSION["g6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g6c"]) && $_SESSION["g6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g6c"]) && $_SESSION["g6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G7' style="padding: 0px 4px" type='submit' value='G7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G7")
                    $_SESSION["g7c"] = 2;
            }
            if(isset($_SESSION["g7c"]) && $_SESSION["g7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g7c"]) && $_SESSION["g7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g7c"]) && $_SESSION["g7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G8' style="padding: 0px 4px" type='submit' value='G8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G8")
                    $_SESSION["g8c"] = 2;
            }
            if(isset($_SESSION["g8c"]) && $_SESSION["g8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g8c"]) && $_SESSION["g8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g8c"]) && $_SESSION["g8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G9' style="padding: 0px 4px" type='submit' value='G9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G9")
                    $_SESSION["g9c"] = 2;
            }
            if(isset($_SESSION["g9c"]) && $_SESSION["g9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g9c"]) && $_SESSION["g9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g9c"]) && $_SESSION["g9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G10' style="padding: 0px 4px" type='submit' value='G10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G10")
                    $_SESSION["g10c"] = 2;
            }
            if(isset($_SESSION["g10c"]) && $_SESSION["g10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g10c"]) && $_SESSION["g10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g10c"]) && $_SESSION["g10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G11' style="padding: 0px 4px" type='submit' value='G11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G11")
                    $_SESSION["g11c"] = 2;
            }
            if(isset($_SESSION["g11c"]) && $_SESSION["g11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g11c"]) && $_SESSION["g11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g11c"]) && $_SESSION["g11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G12' style="padding: 0px 4px" type='submit' value='G12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G12")
                    $_SESSION["g12c"] = 2;
            }
            if(isset($_SESSION["g12c"]) && $_SESSION["g12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g12c"]) && $_SESSION["g12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g12c"]) && $_SESSION["g12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='G13' style="padding: 0px 4px" type='submit' value='G13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G13")
                    $_SESSION["g13c"] = 2;
            }
            if(isset($_SESSION["g13c"]) && $_SESSION["g13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g13c"]) && $_SESSION["g13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g13c"]) && $_SESSION["g13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G14' style="padding: 0px 4px" type='submit' value='G14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G14")
                    $_SESSION["g14c"] = 2;
            }
            if(isset($_SESSION["g14c"]) && $_SESSION["g14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g14c"]) && $_SESSION["g14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g14c"]) && $_SESSION["g14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G15' style="padding: 0px 4px" type='submit' value='G15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G15")
                    $_SESSION["G15c"] = 2;
            }
            if(isset($_SESSION["g15c"]) && $_SESSION["g15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g15c"]) && $_SESSION["g15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g15c"]) && $_SESSION["g15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='G16' style="padding: 0px 4px" type='submit' value='G16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "G16")
                    $_SESSION["g16c"] = 2;
            }
            if(isset($_SESSION["g16c"]) && $_SESSION["g16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["g16c"]) && $_SESSION["g16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["g16c"]) && $_SESSION["g16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">G</span>
        </div>
        <div class="alineacion">
            <span id="first">H</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='H1' style="padding: 0px 4px" type='submit' value='H1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H1")
                    $_SESSION["h1c"] = 2;
            }
            if(isset($_SESSION["h1c"]) && $_SESSION["h1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h1c"]) && $_SESSION["h1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h1c"]) && $_SESSION["h1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H2' style="padding: 0px 4px" type='submit' value='H2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H2")
                    $_SESSION["h2c"] = 2;
            }
            if(isset($_SESSION["h2c"]) && $_SESSION["h2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h2c"]) && $_SESSION["h2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h2c"]) && $_SESSION["h2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H3' style="padding: 0px 4px" type='submit' value='H3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H3")
                    $_SESSION["h3c"] = 2;
            }
            if(isset($_SESSION["h3c"]) && $_SESSION["h3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h3c"]) && $_SESSION["h3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h3c"]) && $_SESSION["h3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H4' style="padding: 0px 4px" type='submit' value='H4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H4")
                    $_SESSION["h4c"] = 2;
            }
            if(isset($_SESSION["h4c"]) && $_SESSION["h4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h4c"]) && $_SESSION["h4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h4c"]) && $_SESSION["h4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='H5' style="padding: 0px 4px" type='submit' value='H5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H5")
                    $_SESSION["h5c"] = 2;
            }
            if(isset($_SESSION["h5c"]) && $_SESSION["h5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h5c"]) && $_SESSION["h5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h5c"]) && $_SESSION["h5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H6' style="padding: 0px 4px" type='submit' value='H6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H6")
                    $_SESSION["h6c"] = 2;
            }
            if(isset($_SESSION["h6c"]) && $_SESSION["h6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h6c"]) && $_SESSION["h6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h6c"]) && $_SESSION["h6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H7' style="padding: 0px 4px" type='submit' value='H7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H7")
                    $_SESSION["h7c"] = 2;
            }
            if(isset($_SESSION["h7c"]) && $_SESSION["h7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h7c"]) && $_SESSION["h7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h7c"]) && $_SESSION["h7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H8' style="padding: 0px 4px" type='submit' value='H8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H8")
                    $_SESSION["h8c"] = 2;
            }
            if(isset($_SESSION["h8c"]) && $_SESSION["h8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h8c"]) && $_SESSION["h8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h8c"]) && $_SESSION["h8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H9' style="padding: 0px 4px" type='submit' value='H9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H9")
                    $_SESSION["h9c"] = 2;
            }
            if(isset($_SESSION["h9c"]) && $_SESSION["h9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h9c"]) && $_SESSION["h9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h9c"]) && $_SESSION["h9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H10' style="padding: 0px 4px" type='submit' value='H10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H10")
                    $_SESSION["h10c"] = 2;
            }
            if(isset($_SESSION["h10c"]) && $_SESSION["h10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h10c"]) && $_SESSION["h10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h10c"]) && $_SESSION["h10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H11' style="padding: 0px 4px" type='submit' value='H11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H11")
                    $_SESSION["h11c"] = 2;
            }
            if(isset($_SESSION["h11c"]) && $_SESSION["h11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h11c"]) && $_SESSION["h11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h11c"]) && $_SESSION["h11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H12' style="padding: 0px 4px" type='submit' value='H12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H12")
                    $_SESSION["h12c"] = 2;
            }
            if(isset($_SESSION["h12c"]) && $_SESSION["h12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h12c"]) && $_SESSION["h12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h12c"]) && $_SESSION["h12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='H13' style="padding: 0px 4px" type='submit' value='H13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H13")
                    $_SESSION["h13c"] = 2;
            }
            if(isset($_SESSION["h13c"]) && $_SESSION["h13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h13c"]) && $_SESSION["h13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h13c"]) && $_SESSION["h13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H14' style="padding: 0px 4px" type='submit' value='H14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H14")
                    $_SESSION["h14c"] = 2;
            }
            if(isset($_SESSION["h14c"]) && $_SESSION["h14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h14c"]) && $_SESSION["h14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h14c"]) && $_SESSION["h14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H15' style="padding: 0px 4px" type='submit' value='H15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H15")
                    $_SESSION["h15c"] = 2;
            }
            if(isset($_SESSION["h15c"]) && $_SESSION["h15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h15c"]) && $_SESSION["h15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h15c"]) && $_SESSION["h15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='H16' style="padding: 0px 4px" type='submit' value='H16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "H16")
                    $_SESSION["h16c"] = 2;
            }
            if(isset($_SESSION["h16c"]) && $_SESSION["h16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["h16c"]) && $_SESSION["h16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["h16c"]) && $_SESSION["h16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">H</span>
        </div>
        <div class="alineacion">
            <span id="first">I</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='I1' style="padding: 0px 4px" type='submit' value='I1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I1")
                    $_SESSION["i1c"] = 2;
            }
            if(isset($_SESSION["i1c"]) && $_SESSION["i1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i1c"]) && $_SESSION["i1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i1c"]) && $_SESSION["i1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I2' style="padding: 0px 4px" type='submit' value='I2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I2")
                    $_SESSION["i2c"] = 2;
            }
            if(isset($_SESSION["i2c"]) && $_SESSION["i2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i2c"]) && $_SESSION["i2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i2c"]) && $_SESSION["i2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I3' style="padding: 0px 4px" type='submit' value='I3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I3")
                    $_SESSION["i3c"] = 2;
            }
            if(isset($_SESSION["i3c"]) && $_SESSION["i3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i3c"]) && $_SESSION["i3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i3c"]) && $_SESSION["i3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I4' style="padding: 0px 4px" type='submit' value='I4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I4")
                    $_SESSION["i4c"] = 2;
            }
            if(isset($_SESSION["i4c"]) && $_SESSION["i4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i4c"]) && $_SESSION["i4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i4c"]) && $_SESSION["i4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='I5' style="padding: 0px 4px" type='submit' value='I5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I5")
                    $_SESSION["i5c"] = 2;
            }
            if(isset($_SESSION["i5c"]) && $_SESSION["i5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i5c"]) && $_SESSION["i5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i5c"]) && $_SESSION["i5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I6' style="padding: 0px 4px" type='submit' value='I6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I6")
                    $_SESSION["i6c"] = 2;
            }
            if(isset($_SESSION["i6c"]) && $_SESSION["i6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i6c"]) && $_SESSION["i6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i6c"]) && $_SESSION["i6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I7' style="padding: 0px 4px" type='submit' value='I7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I7")
                    $_SESSION["i7c"] = 2;
            }
            if(isset($_SESSION["i7c"]) && $_SESSION["i7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i7c"]) && $_SESSION["i7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i7c"]) && $_SESSION["i7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I8' style="padding: 0px 4px" type='submit' value='I8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I8")
                    $_SESSION["i8c"] = 2;
            }
            if(isset($_SESSION["i8c"]) && $_SESSION["i8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i8c"]) && $_SESSION["i8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i8c"]) && $_SESSION["i8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I9' style="padding: 0px 4px" type='submit' value='I9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I9")
                    $_SESSION["i9c"] = 2;
            }
            if(isset($_SESSION["i9c"]) && $_SESSION["i9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i9c"]) && $_SESSION["i9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i9c"]) && $_SESSION["i9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I10' style="padding: 0px 4px" type='submit' value='I10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I10")
                    $_SESSION["i10c"] = 2;
            }
            if(isset($_SESSION["i10c"]) && $_SESSION["i10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i10c"]) && $_SESSION["i10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i10c"]) && $_SESSION["i10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I11' style="padding: 0px 4px" type='submit' value='I11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I11")
                    $_SESSION["i11c"] = 2;
            }
            if(isset($_SESSION["i11c"]) && $_SESSION["i11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i11c"]) && $_SESSION["i11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i11c"]) && $_SESSION["i11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I12' style="padding: 0px 4px" type='submit' value='I12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I12")
                    $_SESSION["i12c"] = 2;
            }
            if(isset($_SESSION["i12c"]) && $_SESSION["i12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i12c"]) && $_SESSION["i12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i12c"]) && $_SESSION["i12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='I13' style="padding: 0px 4px" type='submit' value='I13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I13")
                    $_SESSION["i13c"] = 2;
            }
            if(isset($_SESSION["i13c"]) && $_SESSION["i13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i13c"]) && $_SESSION["i13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i13c"]) && $_SESSION["i13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I14' style="padding: 0px 4px" type='submit' value='I14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I14")
                    $_SESSION["i14c"] = 2;
            }
            if(isset($_SESSION["i14c"]) && $_SESSION["i14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i14c"]) && $_SESSION["i14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i14c"]) && $_SESSION["i14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I15' style="padding: 0px 4px" type='submit' value='I15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I15")
                    $_SESSION["i15c"] = 2;
            }
            if(isset($_SESSION["i15c"]) && $_SESSION["i15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i15c"]) && $_SESSION["i15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i15c"]) && $_SESSION["i15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='I16' style="padding: 0px 4px" type='submit' value='I16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "I16")
                    $_SESSION["i16c"] = 2;
            }
            if(isset($_SESSION["i16c"]) && $_SESSION["i16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["i16c"]) && $_SESSION["i16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["i16c"]) && $_SESSION["i16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">I</span>
        </div>
        <div class="alineacion">
            <span id="first">J</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='J1' style="padding: 0px 4px" type='submit' value='J1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J1")
                    $_SESSION["j1c"] = 2;
            }
            if(isset($_SESSION["j1c"]) && $_SESSION["j1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j1c"]) && $_SESSION["j1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j1c"]) && $_SESSION["j1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J2' style="padding: 0px 4px" type='submit' value='J2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J2")
                    $_SESSION["j2c"] = 2;
            }
            if(isset($_SESSION["j2c"]) && $_SESSION["j2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j2c"]) && $_SESSION["j2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j2c"]) && $_SESSION["j2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J3' style="padding: 0px 4px" type='submit' value='J3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J3")
                    $_SESSION["j3c"] = 2;
            }
            if(isset($_SESSION["j3c"]) && $_SESSION["j3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j3c"]) && $_SESSION["j3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j3c"]) && $_SESSION["j3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J4' style="padding: 0px 4px" type='submit' value='J4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J4")
                    $_SESSION["j4c"] = 2;
            }
            if(isset($_SESSION["j4c"]) && $_SESSION["j4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j4c"]) && $_SESSION["j4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j4c"]) && $_SESSION["j4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='J5' style="padding: 0px 4px" type='submit' value='J5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J5")
                    $_SESSION["j5c"] = 2;
            }
            if(isset($_SESSION["j5c"]) && $_SESSION["j5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j5c"]) && $_SESSION["j5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j5c"]) && $_SESSION["j5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J6' style="padding: 0px 4px" type='submit' value='J6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J6")
                    $_SESSION["j6c"] = 2;
            }
            if(isset($_SESSION["j6c"]) && $_SESSION["j6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j6c"]) && $_SESSION["j6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j6c"]) && $_SESSION["j6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J7' style="padding: 0px 4px" type='submit' value='J7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J7")
                    $_SESSION["j7c"] = 2;
            }
            if(isset($_SESSION["j7c"]) && $_SESSION["j7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j7c"]) && $_SESSION["j7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j7c"]) && $_SESSION["j7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J8' style="padding: 0px 4px" type='submit' value='J8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J8")
                    $_SESSION["j8c"] = 2;
            }
            if(isset($_SESSION["j8c"]) && $_SESSION["j8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j8c"]) && $_SESSION["j8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j8c"]) && $_SESSION["j8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J9' style="padding: 0px 4px" type='submit' value='J9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J9")
                    $_SESSION["j9c"] = 2;
            }
            if(isset($_SESSION["j9c"]) && $_SESSION["j9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j9c"]) && $_SESSION["j9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j9c"]) && $_SESSION["j9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J10' style="padding: 0px 4px" type='submit' value='J10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J10")
                    $_SESSION["j10c"] = 2;
            }
            if(isset($_SESSION["j10c"]) && $_SESSION["j10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j10c"]) && $_SESSION["j10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j10c"]) && $_SESSION["j10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J11' style="padding: 0px 4px" type='submit' value='J11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J11")
                    $_SESSION["j11c"] = 2;
            }
            if(isset($_SESSION["j11c"]) && $_SESSION["j11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j11c"]) && $_SESSION["j11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j11c"]) && $_SESSION["j11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J12' style="padding: 0px 4px" type='submit' value='J12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J12")
                    $_SESSION["j12c"] = 2;
            }
            if(isset($_SESSION["j12c"]) && $_SESSION["j12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j12c"]) && $_SESSION["j12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j12c"]) && $_SESSION["j12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='J13' style="padding: 0px 4px" type='submit' value='J13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J13")
                    $_SESSION["j13c"] = 2;
            }
            if(isset($_SESSION["j13c"]) && $_SESSION["j13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j13c"]) && $_SESSION["j13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j13c"]) && $_SESSION["j13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J14' style="padding: 0px 4px" type='submit' value='J14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J14")
                    $_SESSION["j14c"] = 2;
            }
            if(isset($_SESSION["j14c"]) && $_SESSION["j14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j14c"]) && $_SESSION["j14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j14c"]) && $_SESSION["j14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J15' style="padding: 0px 4px" type='submit' value='J15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J15")
                    $_SESSION["j15c"] = 2;
            }
            if(isset($_SESSION["j15c"]) && $_SESSION["j15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j15c"]) && $_SESSION["j15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j15c"]) && $_SESSION["j15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='J16' style="padding: 0px 4px" type='submit' value='J16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "J16")
                    $_SESSION["j16c"] = 2;
            }
            if(isset($_SESSION["j16c"]) && $_SESSION["j16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["j16c"]) && $_SESSION["j16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["j16c"]) && $_SESSION["j16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">J</span>
        </div>
        <div class="alineacion">
            <span id="first">K</span>
            <form name="form1" style="display: inline-flex" class="asientoPeli2 botonMarco" method="post" action="ventaBoletos/boletos.php">
            <?php 
                if(session_status() != PHP_SESSION_ACTIVE){
                session_start();

                $dbhost = "localhost"; // Host donde esta la base de datos
                $dbname = "cineplus"; // nombre de BD
                $dbuser = "root"; // user name
                $dbpass = "";

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

                if(!isset($_SESSION["cantBoletosCom"])){
                    $_SESSION["cantBoletosCom"] = 0;
                }

                $_SESSION["BoletosComprados"] = $result3; // Variable sesion que almacena los boletos del arreglo $result3
            }
            
            ?>
            <button name='K1' style="padding: 0px 4px" type='submit' value='K1'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K1")
                    $_SESSION["k1c"] = 2;
            }
            if(isset($_SESSION["k1c"]) && $_SESSION["k1c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k1c"]) && $_SESSION["k1c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k1c"]) && $_SESSION["k1c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K2' style="padding: 0px 4px" type='submit' value='K2'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K2")
                    $_SESSION["k2c"] = 2;
            }
            if(isset($_SESSION["k2c"]) && $_SESSION["k2c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k2c"]) && $_SESSION["k2c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k2c"]) && $_SESSION["k2c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K3' style="padding: 0px 4px" type='submit' value='K3'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K3")
                    $_SESSION["k3c"] = 2;
            }
            if(isset($_SESSION["k3c"]) && $_SESSION["k3c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k3c"]) && $_SESSION["k3c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k3c"]) && $_SESSION["k3c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K4' style="padding: 0px 4px" type='submit' value='K4'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K4")
                    $_SESSION["k4c"] = 2;
            }
            if(isset($_SESSION["k4c"]) && $_SESSION["k4c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k4c"]) && $_SESSION["k4c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k4c"]) && $_SESSION["k4c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='K5' style="padding: 0px 4px" type='submit' value='K5'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K5")
                    $_SESSION["k5c"] = 2;
            }
            if(isset($_SESSION["k5c"]) && $_SESSION["k5c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k5c"]) && $_SESSION["k5c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k5c"]) && $_SESSION["k5c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K6' style="padding: 0px 4px" type='submit' value='K6'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K6")
                    $_SESSION["k6c"] = 2;
            }
            if(isset($_SESSION["k6c"]) && $_SESSION["k6c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k6c"]) && $_SESSION["k6c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k6c"]) && $_SESSION["k6c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K7' style="padding: 0px 4px" type='submit' value='K7'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K7")
                    $_SESSION["k7c"] = 2;
            }
            if(isset($_SESSION["k7c"]) && $_SESSION["k7c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k7c"]) && $_SESSION["k7c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k7c"]) && $_SESSION["k7c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K8' style="padding: 0px 4px" type='submit' value='K8'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K8")
                    $_SESSION["k8c"] = 2;
            }
            if(isset($_SESSION["k8c"]) && $_SESSION["k8c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k8c"]) && $_SESSION["k8c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k8c"]) && $_SESSION["k8c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K9' style="padding: 0px 4px" type='submit' value='K9'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K9")
                    $_SESSION["k9c"] = 2;
            }
            if(isset($_SESSION["k9c"]) && $_SESSION["k9c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k9c"]) && $_SESSION["k9c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k9c"]) && $_SESSION["k9c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K10' style="padding: 0px 4px" type='submit' value='K10'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K10")
                    $_SESSION["k10c"] = 2;
            }
            if(isset($_SESSION["k10c"]) && $_SESSION["k10c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k10c"]) && $_SESSION["k10c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k10c"]) && $_SESSION["k10c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K11' style="padding: 0px 4px" type='submit' value='K11'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K11")
                    $_SESSION["k11c"] = 2;
            }
            if(isset($_SESSION["k11c"]) && $_SESSION["k11c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k11c"]) && $_SESSION["k11c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k11c"]) && $_SESSION["k11c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K12' style="padding: 0px 4px" type='submit' value='K12'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K12")
                    $_SESSION["k12c"] = 2;
            }
            if(isset($_SESSION["k12c"]) && $_SESSION["k12c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k12c"]) && $_SESSION["k12c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k12c"]) && $_SESSION["k12c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <span class="tamañoAs espacios"><img src="img/Asiento.png"></span>
            <button name='K13' style="padding: 0px 4px" type='submit' value='K13'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K13")
                    $_SESSION["k13c"] = 2;
            }
            if(isset($_SESSION["k13c"]) && $_SESSION["k13c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k13c"]) && $_SESSION["k13c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k13c"]) && $_SESSION["k13c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K14' style="padding: 0px 4px" type='submit' value='K14'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K14")
                    $_SESSION["k14c"] = 2;
            }
            if(isset($_SESSION["k14c"]) && $_SESSION["k14c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k14c"]) && $_SESSION["k14c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k14c"]) && $_SESSION["k14c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K15' style="padding: 0px 4px" type='submit' value='K15'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K15")
                    $_SESSION["k15c"] = 2;
            }
            if(isset($_SESSION["k15c"]) && $_SESSION["k15c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k15c"]) && $_SESSION["k15c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k15c"]) && $_SESSION["k15c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            <button name='K16' style="padding: 0px 4px" type='submit' value='K16'><?php for($i=0; $i<$_SESSION["cantBoletosCom"]; $i++){
                if($_SESSION["BoletosComprados"][$i] == "K16")
                    $_SESSION["k16c"] = 2;
            }
            if(isset($_SESSION["k16c"]) && $_SESSION["k16c"] == 2) echo "<img width='39px' height='30px' src='img/Asiento Ocupado.png'>"; else{ if(isset($_SESSION["k16c"]) && $_SESSION["k16c"] == 0) echo "<img width='39px' height='30px' src='img/Asiento.png'>"; else{ if(isset($_SESSION["k16c"]) && $_SESSION["k16c"] == 1) echo "<img width='39px' height='30px' src='img/Asiento Selected.png'>"; else echo "<img width='39px' height='30px' src='img/Asiento.png'>";}}?></button>
            </form>
            <span id="final">K</span>
        </div>
        </div>
        <section class="estructura">
            <div class="contenedorAS">
                <h1 style="margin-top:4rem">Asientos</h1>
                <p><?php if(session_status() == PHP_SESSION_ACTIVE){
                            $asientos = array(5);

                            $n = 0;

                            for($i=1; $i<7; $i++){
                                if(isset($_SESSION["as"."$i"]) && $_SESSION["as"."$i"] != 0){
                                    $asientos[$n] = $_SESSION["as"."$i"];
                                    $n++;
                                }else{
                                    $asientos[$n] = "";
                                    $n++;
                                }
                            }

                            $texto = "";


                            for($p=0; $p<6; $p++){
                                if($p > 0 && $asientos[$p] != ""){
                                    if($texto == ""){
                                        $texto = $texto.$asientos[$p];
                                    }else
                                    $texto = $texto.", ".$asientos[$p];
                                }else{
                                $texto = $texto.$asientos[$p]."";
                                }
                            }

                            echo $texto;
                            $_SESSION["numAsientos"] = $texto;
                            } ?></p>

                <h1>Cantidad a pagar</h1>
                <h2><?php 
                        if(session_status() == PHP_SESSION_ACTIVE){

                        $_SESSION["cantMenor"] = $_SESSION["cantMe"];
                        $_SESSION["cantMayor"] = $_SESSION["cantMa"];
                        $_SESSION["cantAdulto"] = $_SESSION["cantAd"];

                        $precio = 0;
                        $precio1 = 0;
                        $precio2 = 0;
                        $tamañoM = ($_SESSION["cantMenor"] + $_SESSION["cantMayor"])+1;

                        //echo $_SESSION["cantMenor"];
                        //echo $_SESSION["cantMayor"];
                        //echo $_SESSION["cantAdulto"];
                        //echo $tamañoM;
                        //exit();

                        if($_SESSION["cantMenor"] != "" && $_SESSION["cantMayor"] == "" && $_SESSION["cantAdulto"] == ""){
                            $precio = 55;
                        }else{
                            if($_SESSION["cantMenor"] == "" && $_SESSION["cantMayor"] != "" && $_SESSION["cantAdulto"] == ""){
                                $precio = 55;
                        }else{
                            if($_SESSION["cantMenor"] == "" && $_SESSION["cantMayor"] == "" && $_SESSION["cantAdulto"] != ""){
                                $precio = 60;
                            }else{
                                if($_SESSION["cantMenor"] != "" && $_SESSION["cantMayor"] != "" && $_SESSION["cantAdulto"] == ""){
                                    $precio = 55;
                                }else{
                                    if($_SESSION["cantMenor"] != "" && $_SESSION["cantMayor"] != "" && $_SESSION["cantAdulto"] != ""){
                                        $precio1 = 55;
                                        //$tam1 = $_SESSION["cantMenor"] + $_SESSION["cantMayor"];
                                        $precio2 = 60;
                                        //$tam2 = $_SESSION["cantAdulto"];
                                    }else{
                                        if($_SESSION["cantMenor"] == "" && $_SESSION["cantMayor"] != "" && $_SESSION["cantAdulto"] != ""){
                                            $precio1 = 55;
                                            $precio2 = 60;
                                        }else{
                                            if($_SESSION["cantMenor"] != "" && $_SESSION["cantMayor"] == "" && $_SESSION["cantAdulto"] != ""){
                                                $precio1 = 55;
                                                $precio2 = 60;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        }

                        $total = 0;

                        $tamaño = ($_SESSION["cantMe"] + $_SESSION["cantMa"] + $_SESSION["cantAd"])+1;
                        for($i=1; $i<$tamaño; $i++){
                            if($precio != 0 && $precio1 == 0 && $precio2 == 0){
                                if($i<$tamaño && isset($_SESSION["as"."$i"]) && $_SESSION["as"."$i"] != 0){
                                    $total = $total + $precio;
                                }
                            }else{
                                if($precio == 0 && $precio1 != 0 && $precio2 != 0){
                                    if($i<$tamañoM && isset($_SESSION["as"."$i"]) && $_SESSION["as"."$i"] != 0){
                                        $total = $total + $precio1;
                                    }else{
                                        if($i>$tamañoM-1 && isset($_SESSION["as"."$i"]) && $_SESSION["as"."$i"] != 0){
                                            $total = $total + $precio2;
                                        }
                                    }
                                }
                            }
                            }
                            echo "$"."$total";
                            $_SESSION["cantAPagar"] = $total;
                            }
                            ?></h2>
                <div id="paypal-button-container-P-57F7608422635401BMVEER7A"></div>
                <script src="https://www.paypal.com/sdk/js?client-id=AdCaUGDZ3sxs5TeTHTmZ-hluqNiNfI5cRzFGiSUhIoGUlqgNBFKDvT4KA0qXFJuJs72K-_qE4HWCWAH6&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
                <script>
                paypal.Buttons({
                    style: {
                        shape: 'pill',
                        color: 'gold',
                        layout: 'vertical',
                        label: 'paypal'
                    },
                    createSubscription: function(data, actions) {
                        return actions.subscription.create({
                        /* Creates the subscription */
                        plan_id: 'P-57F7608422635401BMVEER7A'
                        });
                    },
                    onApprove: function(data, actions) {
                        alert(data.subscriptionID); // You can add optional success message for the subscriber here
                    }
                }).render('#paypal-button-container-P-57F7608422635401BMVEER7A'); // Renders the PayPal button
                </script>
                <a href="ventaBoletos/pdf.php"><input class="boton" type="submit" style="margin-top: 0rem;" value="Pagar los boletos"></a>
            </div>
            </section>
        </section>
    </main>



    <footer class="acomodarFinalAS">   
        <p> Atención telefóncia </p>
        <p> 55 4059-4393</p>
        <br><br>
        <p><a href="sobre cinemex.html">Sobre Cinemex </a></p>
        <p><a href="politica de precios.html">Politica de precios</a></p>
        <p><a href="politica de reembolsos.html">Politica de reembolsos</a></p>
        <p><a href="terminos y condiciones.html">Términos y condiciones</a></p>
        <p style="margin-bottom: 0rem;"><a href="aviso de privacidad.html">Aviso de privacidad</a></p>
    </footer>
</body>
</html>