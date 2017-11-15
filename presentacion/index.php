<!DOCTYPE HTML>
<html>
    <head>
        <title>URESA</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="../resources/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../resources/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="../resources/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="../resources/css/ie8.css" /><![endif]-->
    </head>
<body class="landing">
    <div id="page-wrapper">
        <!-- Header -->
	<header id="header">
            <h1 id="logo"><a>Gobierno de Rio Negro</a></h1>
            <nav id="nav">
		<ul>
                    <li><a href="index.html">Inicio</a></li>
                    <li>
			<a href="#">Tramites</a>
			<ul>
                            <li><a href="" >Carga Prod.Alimenticio</a></li>
                            <li><a href="establecimientos.html">Carga Establecimiento</a></li>
									
			</ul>
                    </li>
                    <li>
                        <a>Conultas</a>
                        <ul>
                            <li><a  href="#one" >Consultar RNE</a></li>
                            <li><a href="#one" onClick="muestraEsta()">Consultar RNPA</a></li>
                        </ul>
                            
                    </li>
                    <li><a>Estadisticas</a></li>
		</ul>
            </nav>
	</header>

	<!-- Banner -->
        <div id="inicio">
            <section id="banner">
		<div class="content">
                    <header style="text-align:center;">
			<h2>BIENVENIDO</h2>
			<p>Seleccione una opción para comenzar.</p>
                    </header>
                    <span class="image"><img src="../resources/images/pic01.jpg" alt="RN" /></span>
		</div>
		<a href="#one" class="goto-next scrolly">Next</a><!--Se usa para hacer el cambio dinamico del div-->
            </section>
        </div>
    </div>

	<script>
   //script para cambia div dinamicamente
	function muestraEsta(){
		alert("Muestra Estacionamiento");
		 var establecimiento= document.getElementById("cargaEstablecimiento");
		 var inicio= document.getElementById("inicio");
		 inicio.style.display='none';//ocultamos el div activo
		 establecimiento.style.display=' ';//mostramos el proximo div 
		}
    </script>

		<!-- Scripts -->
			<script src="../resources/js/jquery.min.js"></script>
			<script src="../resources/js/jquery.scrolly.min.js"></script>
			<script src="../resources/js/jquery.dropotron.min.js"></script>
			<script src="../resources/js/jquery.scrollex.min.js"></script>
			<script src="../resources/js/skel.min.js"></script>
			<script src="../resources/js/util.js"></script>
			<!--[if lte IE 8]><script src="../resources/js/ie/respond.min.js"></script><![endif]-->
			<script src="../resources/js/main.js"></script>

	</body>
</html>