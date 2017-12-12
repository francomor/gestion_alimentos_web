<!DOCTYPE HTML>

<html>

<head>
    <title>Estadisticas</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../resources/images/favicon.ico">
    <!--[if lte IE 8]><script src="../resources/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../resources/css/materialize.css" />

    <!--[if lte IE 9]><link rel="stylesheet" href="../resources/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="../resources/css/ie8.css" /><![endif]-->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var yaCargo = false;

        function AJAX() {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    cargarDatos(this.responseText);

                    yaCargo = true;
                }

            };
            xmlhttp.open("GET", "../logica/estadisticaEstablecimientos.php", true);
            xmlhttp.send();
        }
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(AJAX);

        var data = [];

        function cargarDatos(strDatos) {


            data[0] = new google.visualization.DataTable();
            data[1] = new google.visualization.DataTable();

            data[0].addColumn('string', 'Años');
            data[0].addColumn('number', 'Cantidad');

            var EstabProd = strDatos.split("/");

            var estab = EstabProd[0].split(",");
            for (var i = 0; i < estab.length - 1; i++) {
                var aux = estab[i].split(":")
                //alert(aux[0]+"/"+aux[1]);
                data[0].addRow([aux[0], parseInt(aux[1])]);
            }

            data[1].addColumn('string', 'Años');
            data[1].addColumn('number', 'Cantidad');
            var prod = EstabProd[1].split(",");
            for (var i = 0; i < prod.length - 1; i++) {
                var aux = prod[i].split(":")
                //alert(aux[0]+"/"+aux[1]);
                data[1].addRow([aux[0], parseInt(aux[1])]);
            }


        }
        var options;

        function drawChart() {

            if (yaCargo) {
                var graficoActual = document.getElementById("tipoEstadistica").value;
                var chart = new google.visualization.BarChart(document.getElementById('grafico'));
                switch (graficoActual) {
                    case "Producto":
                        options = {
                            title: 'Estadisticas de productos por año',
                            colors: ['#8bc34a']
                        };

                        chart.draw(data[1], options);
                        break;

                    case "Establecimiento":
                        options = {
                            title: 'Estadisticas de establecimientos',

                            colors: ['#8bc34a']
                        };
                        chart.draw(data[0], options);
                        break;
                }
            }


        }
    </script>



</head>

<body style="background: #ffffff;">

    <div id="page-wrapper">
        <?php
	
		include("header.php");
    ?>
            <!-- Main -->
            <header class="major">
                <br>
                <h2>Estadisticas</h2>
            </header>

            <div id="main" class="wrapper style1">

                <div class="container">
                    <!-- Form : Buscar por RNA Empresa-->

                    <form method="post" action="#">
                        <h4>Estadisticas de la Empresa </h4>
                        <div class="row ">


                            <div class="input-field col s5">
                                <select name="categoria" id="tipoEstadistica" onchange="drawChart()">
                                    <option value="seleccionar..." disabled selected>seleccionar...</option>
                                    <option value="Producto">Producto</option>
                                    <option value="Establecimiento">Establecimiento</option>

                                </select>
                                <label>Tipo de Estadistica</label>

                            </div>



                        </div>
                    </form>
                    <!-- finForm_Buscar -->

                    <!-- Table -->

                </div>
                <!-- Fin class=container -->

                <div class="row">
                    <div class="clearfix"></div>
                    <div class="col s12 m12">
                        <div class="chart" id="grafico"></div>
                    </div>
                </div>

            </div>
            <!-- Fin class=wrapper stylele -->
    </div>
    <!-- Fin class=page-wrapper -->

    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../resources/js/materialize.js"></script>
    <script type="text/javascript">
        $(window).resize(function () {
            drawChart();

        });
    </script>
    <script>
        $(document).ready(function () {
            $('select:not([multiple])').material_select();

        });
    </script>

    <div>
        <?php
	
		include("footer.php");
    ?>
    </div>

</body>

</html>