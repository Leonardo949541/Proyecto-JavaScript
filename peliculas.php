<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera - Cinemex Plus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/styles.css" as="style">
    <link href="css/styles.css" rel="stylesheet">

    <style type="text/css">
#slidebox{position:relative; border:1px solid #ccc; margin:40px auto;overflow:hidden;}
#slidebox, #slidebox ul {width:600px;height:300px;}
#slidebox, #slidebox ul li{width:600px;height:300px;}
#slidebox ul li{position:relative; left:0; background:#eee; float:left;list-style: none; padding:15px 28px;  font-family:Verdana, Geneva, sans-serif; font-size:13px;}
#slidebox .next, #slidebox .previous{position:absolute; z-index:2; display:block; width:21px; height:21px;top:139px;}
#slidebox .next{right:0; margin-right:10px; background:url("Carrusel JavaScript/slidebox_next.png") no-repeat left top;}
#slidebox .next:hover{background:url("Carrusel JavaScript/slidebox_next_hover.png") no-repeat left top;}
#slidebox .previous{margin-left:10px; background:url("Carrusel JavaScript/slidebox_previous.png") no-repeat left top;}
#slidebox .previous:hover{background:url("Carrusel JavaScript/slidebox_previous_hover.png") no-repeat left top;}
#slidebox .thumbs{position:absolute; z-index:2; bottom:10px; right:10px;}
#slidebox .thumbs a{display:block; margin-left:5px; float:left; font-family:Verdana, Geneva, sans-serif; font-size:9px; text-decoration:none; padding:2px 4px; background:url("Carrusel JavaScript/slidebox_thumb.png"); color:#fff;}
#slidebox .thumbs a:hover{background:#fff; color:#000;}
#slidebox .thumbs .thumbActive{background:#fff; color:#000; display:block; margin-left:5px; float:left; font-family:Verdana, Geneva, sans-serif; font-size:9px; text-decoration:none; padding:2px 4px;}
</style>

<script src="Carrusel JavaScript/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="Carrusel JavaScript/jcarousellite_1.0.1c5.js" type="text/javascript"></script>
<script type="text/javascript">

$(function() {
	$("#slidebox").jCarouselLite({
		vertical: false,
		hoverPause:true,
		btnPrev: ".previous",
		btnNext: ".next",
		visible: 1,
		start: 0,
		scroll: 1,
		circular: true,
		auto:1000,
		speed:500,				
		btnGo:
		    [".1", ".2",
		    ".3", ".4"],
		
		afterEnd: function(a, to, btnGo) {
				if(btnGo.length <= to){
					to = 0;
				}
				$(".thumbActive").removeClass("thumbActive");
				$(btnGo[to]).addClass("thumbActive");
		    }
	});
});
</script>
</head>

<body>
    <header>
        <section class="contexto">
            <div class="contexto-fondo">
        <h1 class="titulo h1">Cinemex  <span>PLUS</span></h1>
        <div style="display: flex; align-items: center;">
            <h2>Torreón</h2> &nbsp; &nbsp;
            <form name="formularioI" method="post" action="ventaBoletos/registro.php">
                <input type="hidden" name="inicio2" value="inicioP">  
                <input type="submit" name="inicio" value="Iniciar Sesión">
            </form>
            <form name="formularioP" method="post" action="ventaBoletos/registro.php">
                <input type="submit" name="salir" value="Cerrar Sesión">
            </form>
            <form name="formularioAd" method="post" action="admin/admin.php">
                <input type="hidden" name="inicioAd" value="inicioAdmin">  
                <input type="submit" name="inicioAdmin1" value="Sesión Admin">
                <input type="submit" name="inicioAdmin1" value="Cerrar Admin">
                <input type="submit" name="reset" value="ResetUD">
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

    <section class="prox">
        <p style="text-align:center; font-size: 4rem;" class="degE tamañoTitulo"> Estrenos</p>
    
        <section class="tamañoPrincipal">
        <h1>Godzilla 2: rey de los monstruos</h1>
        <div></div>
        <div class="contenido-al-lado">
        <a href="https://www.youtube.com/watch?v=KA94TLkE8eY"><img src="img/Godzilla 2.jpg" width="370" height="500"></a>
        </div>
        <div>
        <h1>Sinopsis</h1>
        <p>Seguimos las aventuras de unos criptzóologos de una agencia mientras tratan de enfrentarse a unos monstruos 
        entre los que se encuentra el propio Godzilla. Entre todos intentarán frenar a estas ancianas criaturas que 
        harán todo lo posible por sobrevivir, arriesgando toda la vida de los humanos.</p>
        <!--<br>-->
        </div>
        <div class="contenido-al-ladoP aliR">
        <p><h1 style="display: inline">Reparto</h1>
        <p><h2 style="display: inline">&nbsp; Mark Russel: &nbsp;</h2> Kyle Chandle</p>
        <p><h2 style="display: inline">&nbsp; Dr. Emma Russell: &nbsp;</h2> Vera Farmiga</p>
        <p><h2 style="display: inline">&nbsp; Madison Russell: &nbsp;</h2> Millie Bobby Brown</p>
        <p><h2 style="display: inline">&nbsp; Dr. Ishiro Serizawa: &nbsp;</h2> Ken Watanabe</p>
        <p><h1 style="display: inline">Director</h1></p>
        <p><h2 style="display: inline">&nbsp; Michael Dougherty</h2></p>
        <p><h1 style="display: inline">Duración</h1></p>
        <p><h2 class="posicion">&nbsp; 2h 12m</h2></p></p>
        </div>
        <div>
        <p><h1 class="alinearP">Genero</h1></p>
        <div class="alineamiento-genero">
        <p style="position: absolute;"><h2 style="display: inline;" class="encuadre">Acción<h2 style="display: inline" class="encuadre">Fantástico</h2></h2></p>
        </div>
        <p><h1 class="alinearP">Funciones</h1></p>
        <div class="alineamiento-generoP links">
        <p style="position: absolute;"><?php $tipo = "Godzilla 2: El Rey de los Monstruos"; $funcion = "06:00 PM"; echo '<a href="ventaBoletos/registro.php?tipoP=',urlencode($tipo),'&funcion=',urlencode($funcion),'"><h2 style="display: inline" class="encuadre">06:00 PM</h2></a>'?></p>
        <p style="position: absolute;"><?php $tipo = "Godzilla 2: El Rey de los Monstruos"; $funcion = "08:00 PM"; echo '<a href="ventaBoletos/registro.php?tipoP=',urlencode($tipo),'&funcion=',urlencode($funcion),'"><h2 style="display: inline" class="encuadre">08:00 PM</h2></a>'?></p>
        </div>
        </div>
        </section>
    
        <section class="tamañoPrincipal tamaño2P">
        <h1 class="acomodoPeli">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Megadolón</h1>
        <div></div>
        <div class="contenido-al-lado2">
        <a href="https://www.youtube.com/watch?v=azI5fLoocDo"><img src="img/The Meg.jpg" width="370" height="500"></a>
        </div>
        <div>
        <h1>Sinopsis</h1>
        <p>Un tiburón prehistórico de 25 metros de longitud amenaza a los tripulantes de un submarino hundido en la fosa 
        más profunda del océano Pacífico y al grupo enviado para rescatarlos. Si no lo detienen, el tiburón causará grandes
        estragos.</p>
        </div>
        <div class="contenido-al-lado2P aliR">
        <p><h1 style="display: inline">Reparto</h1>
        <p><h2 style="display: inline">&nbsp; Jonas Taylor: &nbsp;</h2> Jason Statham</p>
        <p><h2 style="display: inline">&nbsp; Suyin: &nbsp;</h2> Bingbing Li</p>
        <p><h2 style="display: inline">&nbsp; Morris: &nbsp;</h2> Rainn Wilson</p>
        <p><h2 style="display: inline">&nbsp; Zhang: &nbsp;</h2> Winston Chao</p>
        <p><h1 style="display: inline">Director</h1></p>
        <p><h2 style="display: inline">&nbsp; Jon Turteltaub</h2></p>
        <p><h1 style="display: inline">Duración</h1></p>
        <p><h2 style="display: inline">&nbsp; 1h 53m</h2></p></p>
        </div>
        <div>
        <p><h1 class="alinearP">Genero</h1></p>
        <div class="alineamiento-genero">
        <p style="position: absolute;"><h2 style="display: inline;" class="encuadre">Terror<h2 style="display: inline" class="encuadre">Acción</h2></h2></p>
        </div>
        <p><h1 class="alinearP">Funciones</h1></p>
        <div class="alineamiento-generoP">
        <p style="position: absolute;"><?php $tipo = "Megadolon"; $funcion = "07:20 PM"; echo '<a href="ventaBoletos/registro.php?tipoP=',urlencode($tipo),'&funcion=',urlencode($funcion),'"><h2 style="display: inline" class="encuadre">07:20 PM</h2></a>'?></p>
        <p style="position: absolute;"><?php $tipo = "Megadolon"; $funcion = "10:00 PM"; echo '<a href="ventaBoletos/registro.php?tipoP=',urlencode($tipo),'&funcion=',urlencode($funcion),'"><h2 style="display: inline" class="encuadre">10:00 PM</h2></a>'?></p>
        </div>
        </div>
        </section>

        
        <!--<form class="tamaño3" name="formularioAD" method="post" action="admin/admin.php">
        <h1>Nombre de la pelicula</h1>
        <input name="nombreP" type="text" placeholder="nombre pelicula">
        <h1>Portada</h1>
        <input type="file" id="portada" name="portada" accept="image/png, image/jpg" />
        <h1>Sinopsis</h1>
        <input name="sinopsisText" type="text">
        <h1>Reparto</h1>
        <input name="actor1" type="text" placeholder="actor1">
        <input name="actor2" type="text" placeholder="actor2">
        <input name="actor3" type="text" placeholder="actor3">
        <input name="actor4" type="text" placeholder="actor4">
        <h1>Director</h1>
        <input name="director" type="text" placeholder="director">
        <h1>Duración</h1>
        <input name="duracion" type="text" placeholder="duración pelicula">
        <h1>Genero</h1>
        <input name="genero1" type="text" placeholder="genero1">
        <input name="genero2" type="text" placeholder="genero2">
        <h1>Funciones</h1>
        <input name="funcion1" type="text" placeholder="funcion1">
        <input name="funcion2" type="text" placeholder="funcion2">
        <p><input name="agregar" type="submit" value="Agregar Pelicula"></p>
        </form>-->

        <?php
        if(isset($_SESSION["activoAd"]) && $_SESSION["activo"] == 1){
        $dbhost = "localhost"; // Host donde esta la base de datos
        $dbname = "cineplus"; // nombre de BD
        $dbuser = "root"; // user name
        $dbpass = "";

        $conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname, "3306") or die("Problemas con la conexión");
        $sqlCantidadP = mysqli_query($conexion, "SELECT SUM(`idP`) FROM `peliculas`");
        $sqlNombre = mysqli_query($conexion, "SELECT `nombreP` FROM `peliculas`");
        $sqlPortada = mysqli_query($conexion, "SELECT `portada` FROM `peliculas`");
        $sqlSinopsis = mysqli_query($conexion, "SELECT `sinopsisText` FROM `peliculas`");
        $sqlActor1 = mysqli_query($conexion, "SELECT `actor1` FROM `peliculas`");
        $sqlActor2 = mysqli_query($conexion, "SELECT `actor2` FROM `peliculas`");
        $sqlActor3 = mysqli_query($conexion, "SELECT `actor3` FROM `peliculas`");
        $sqlActor4 = mysqli_query($conexion, "SELECT `actor4` FROM `peliculas`");
        $sqlDirector = mysqli_query($conexion, "SELECT `director` FROM `peliculas`");
        $sqlDuracion = mysqli_query($conexion, "SELECT `duracion` FROM `peliculas`");
        $sqlGenero1 = mysqli_query($conexion, "SELECT `genero1` FROM `peliculas`");
        $sqlGenero2 = mysqli_query($conexion, "SELECT `genero2` FROM `peliculas`");
        $sqlFuncion1 = mysqli_query($conexion, "SELECT `funcion1` FROM `peliculas`");
        $sqlFuncion2 = mysqli_query($conexion, "SELECT `funcion2` FROM `peliculas`");
        $resultCant = mysqli_fetch_row($sqlCantidadP);
        mysqli_close($conexion);

        $resultN = array($resultCant);
        $resultP = array($resultCant);
        $resultS = array($resultCant);
        $resultA1 = array($resultCant);
        $resultA2 = array($resultCant);
        $resultA3 = array($resultCant);
        $resultA4 = array($resultCant);
        $resultDir = array($resultCant);
        $resultDura = array($resultCant);
        $resultG1 = array($resultCant);
        $resultG2 = array($resultCant);
        $resultF1 = array($resultCant);
        $resultF2 = array($resultCant);

        $resultN = mysqli_fetch_row($sqlNombre);
        $resultP = mysqli_fetch_row($sqlPortada);
        $resultS = mysqli_fetch_row($sqlSinopsis);
        $resultA1 = mysqli_fetch_row($sqlActor1);
        $resultA2 = mysqli_fetch_row($sqlActor2);
        $resultA3 = mysqli_fetch_row($sqlActor3);
        $resultA4 = mysqli_fetch_row($sqlActor4);
        $resultDir = mysqli_fetch_row($sqlDirector);
        $resultDura = mysqli_fetch_row($sqlDuracion);
        $resultG1 = mysqli_fetch_row($sqlGenero1);
        $resultG2 = mysqli_fetch_row($sqlGenero2);
        $resultF1 = mysqli_fetch_row($sqlFuncion1);
        $resultF2 = mysqli_fetch_row($sqlFuncion2);

        if($resultN == ""){
            return;
        }else{
        for($i=0; $i<$resultCant; $i++){
        echo '<section class="tamañoPrincipal tamaño2P">';
        echo '<h1 class="acomodoPeli">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $resultN[0]</h1>';
        echo '<div></div>';
        echo '<div class="contenido-al-lado2">';
        echo '<a href="https://www.youtube.com/watch?v=azI5fLoocDo"><img src="resultP[0]" width="370" height="500"></a>';
        echo '</div>';
        echo '<div>';
        echo '<h1>Sinopsis</h1>';
        echo '<p>$resultS[0]</p>';
        echo '</div>';
        echo '<div class="contenido-al-lado2P aliR">';
        echo '<p><h1 style="display: inline">Reparto</h1>';
        echo '<p><h2 style="display: inline">&nbsp; $resultA1[0] &nbsp;</h2></p>';
        echo '<p><h2 style="display: inline">&nbsp; $resultA2[0] &nbsp;</h2></p>';
        echo '<p><h2 style="display: inline">&nbsp; $resultA3[0] &nbsp;</h2></p>';
        echo '<p><h2 style="display: inline">&nbsp; $resultA4[0] &nbsp;</h2></p>';
        echo '<p><h1 style="display: inline">Director</h1></p>';
        echo '<p><h2 style="display: inline">&nbsp; $resultDir[0] &nbsp;</h2></p>';
        echo '<p><h1 style="display: inline">Duración</h1></p>';
        echo '<p><h2 style="display: inline">&nbsp; $resultDura[0]</h2></p></p>';
        echo '</div>';
        echo '<div>';
        echo '<p><h1 class="alinearP">Genero</h1></p>';
        echo '<div class="alineamiento-genero">';
        echo '<p style="position: absolute;"><h2 style="display: inline;" class="encuadre">$resultG1[0]<h2 style="display: inline" class="encuadre">$resultG2[0]</h2></h2></p>';
        echo '</div>';
        echo '<p><h1 class="alinearP">Funciones</h1></p>';
        echo '<div class="alineamiento-generoP">';
        echo '<p style="position: absolute;"> <a href="ventaBoletos/registro.php?tipoP=',urlencode($resultN[0]),'&funcion=',urlencode($resultF1[0]),'"><h2 style="display: inline" class="encuadre">07:20 PM</h2></a></p>';
        echo '<p style="position: absolute;"> <a href="ventaBoletos/registro.php?tipoP=',urlencode($resultN[0]),'&funcion=',urlencode($resultF2[0]),'"><h2 style="display: inline" class="encuadre">10:00 PM</h2></a></p>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        }
    }
}
        ?>
        </section>
    </main>

<section style="margin-top: 26rem">
<div id="slidebox">
<div class="next"></div>
<div class="previous"></div>
<div class="thumbs">
<a href="#" onClick="" class="1 thumbActive">1</a> 
<a href="#" onClick="" class="2">2</a> 
<a href="#" onClick="" class="3">3</a> 
<a href="#" onClick="" class="4">4</a> 
</div>
	<ul>
    	<li><img alt="" src="../img/Godzilla 2 Movie.jpg" width="600" height="276" /></li>
    	<li><img alt="" src="../img/The Meg Movie.jpg" width="600" height="276" /></li>
    	<li><img alt="" src="../img/Transformers - rise of the beasts.jpeg" width="600" height="276" /></li>
    	<li><img alt="" src="../img/John Wick Chapter 4.jpg" width="600" height="276" /></li>
	</ul>
</div>
</section>

    
    


    <footer class="acomodarFinalPeli">   
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