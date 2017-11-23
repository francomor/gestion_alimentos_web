<!DOCTYPE HTML>

<html>
    <head>  
	<title>Carga Establecimientos</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="../resources/images/favicon.ico">
	<!--[if lte IE 8]><script src="../resources/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../resources/css/main.css" />
    <link rel="stylesheet" href="../resources/css/materialize.css" />
    
	<!--[if lte IE 9]><link rel="stylesheet" href="../resources/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="../resources/css/ie8.css" /><![endif]-->
    </head>
    <body  style="background: #1c1d26;">    
   
        <div id="page-wrapper">

        	<div><?php
	
		include("header.php");
    ?></div>
        <!-- Main -->
        <header class="major">
                   <h2>Consulta por RNPA</h2>     
                 </header> 

        <div id="main" class="wrapper style1">
        
            <div class="container">
         	<!-- Form : Buscar por RNA Empresa--> 
	
                    <form method="post" action="#">
                    			<h4>Buscar RNPA de la Empresa: </h4>
							<div class="row ">
            				
            				
                            <div class="input-field col s5">
                                <input type="text" name="rnpa_em" id="rnpa_em" value="" class="validate" onkeyup="consulta_rnpa(this.value)"/>
                               
                            </div>
                            <div class="4u 12u\$(xsmall)" align="left" style="padding-top:2.5em;">
                                <img src="../resources/images/search.png" width="20" height="20" alt="search">
                             </div>
                        </div>
                    </form><!-- finForm_Buscar -->
          
                <!-- Table -->
					
                 <div id="consulta">  </div> <!-- aca cierra el div de la consulta-->
                   
                
                
                


            </div><!-- Fin class=container -->
        </div><!-- Fin class=wrapper stylele -->
  </div><!-- Fin class=page-wrapper -->
        <script>
        function consulta_rnpa(rnpa)   
			    {  
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("consulta").innerHTML = this.responseText;
                            }
                                 };
                            xmlhttp.open("GET", "../logica/consultarnpa.php?rnpa=" + rnpa, true);
                            xmlhttp.send();
			   }  
        </script>
        <!-- Scripts -->
		
       


    </body>
</html>