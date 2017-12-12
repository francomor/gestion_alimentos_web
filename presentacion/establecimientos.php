<!DOCTYPE HTML>
<?php
include("../logica/clases.php");
include("../logica/validar_cuit.php");
error_reporting(E_ALL ^ E_NOTICE^ E_WARNING);
?>
    <html>

    <head>
        <title>Carga Establecimientos</title>
        <link rel="icon" href="../resources/images/favicon.ico">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../resources/css/materialize.css" />
    </head>

    <body onload="cargar()">
        <div>
            <?php
            include("header.php");
        ?>

        </div>
        <div id="page-wrapper">

            <!-- Main -->
            <div id="main" class="wrapper style1">
                <div class="container">
                    <header class="major">
                        <h2>Carga de Establecimientos</h2>
                    </header>

                    <!-- Form : Buscar por CUIT Empresa- onsubmit="return validar()"-->
                    <form method="post" action="../logica/cargarrne.php" class="col s12" id="formu">
                        <h4>Buscar CUIT de la Empresa</h4>
                        <div class="row ">

                            <div class="input-field col s8 m18 12">
                                <input type="text" pattern="[0-9]" class="validate" name="cuit" onkeyup="comprobar_cuit(this.value)" value="" required />
                                <label>CUIT: </label>
                            </div>
                            <div class="col s4 m4 4" align="left" style="padding-top:2.5em;">
                                <img src="../resources/images/search.png" width="20" height="20" alt="search">
                            </div>
                        </div>
                        </br>

                        <div class="col s4 m4 4">
                            <span id="cambiar_cuit"></span>
                        </div>

                        </br>
                        <h4>Registro RNE</h4>
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="text" name="rne" id="rne" pattern="[0-9]*" value="">
                                <label>RNE: </label>
                            </div>
                            <div class="input-field col s6">
                                <input id="venc" name="venc" type="text" maxlength="12" value="" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"
                                    placeholder="2017-11-02">
                                <label>Fecha de vencimiento : </label>
                            </div>
                            <div class="input-field col s6">
                                <h4>Datos del Establecimiento</h4>
                                </br>
                            </div>
                            <div class="input-field col s12">
                                <input name="nombre" id="nombre" type="text" class="validate" required value="">
                                <label>Nombre del Establecimiento:</label>
                            </div>

                            <div class="input-field col s6">
                                <select name="categoria" id="categoria">
                                    <option value="seleccionar..." disabled selected>seleccionar...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                                <label>Categoria</label>
                            </div>
                            <div class="input-field col s6">
                                <input name="nro_factura" type="number" class="validate" value="">
                                <label>Nro. Factura: </label>
                            </div>

                            <div class="input-field col s6">
                                <input name="domicilio" type="text" class="validate" required value="">
                                <label>Domicilio: </label>
                            </div>
                            <div class="input-field col s6">
                                <select id="localidad" name="localidad" required="true">
                                    <option value="seleccionar..." disabled selected>seleccionar...</option>
                                    <option value="Bariloche">Bariloche</option>
                                    <option value="El bolson">El Bolson</option>
                                </select>
                                <label>Localidad: </label>
                            </div>
                            <div class="input-field col s6">
                                <input name="telefono" type=text pattern="[0-9]*" title="Solo se aceptan números" value="">
                                <label>Telefono: </label>
                            </div>
                        </div>

                        <div class="col s12 m12 l2">
                            <label style="color:#333">Rubros: </label>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l2">

                                <table width="244%" height="312">
                                    <tbody>
                                        <tr>
                                            <td style="background-color:#FFF;">
                                                <label style="color:#333" for="sel1">Origen:</label>
                                                <div id="aca">
                                                    <!--Select de rubros  -->
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s12 m12 l2" align="center">
                                <ul class="actions vertical small">
                                    <li>
                                        <br>
                                    </li>
                                    <li>
                                        <input type="button" class="button special small" value="Agregar" onClick="pasar()">
                                    </li>
                                    <li>
                                        <br>
                                    </li>
                                    <li>
                                        <input type="button" class="button special small" value="Quitar" onClick="quitar()">
                                    </li>
                                </ul>
                            </div>
                            <div class="col s12 m12 l2">
                                <table width="258%" height="312">
                                    <tbody>
                                        <tr>
                                            <td style="background-color:#FFF;">
                                                <label style="color:#333" for="sel2">Destino:</label>
                                                <select class="browser-default" id="sel2" size="12">
                                                    <option value="-">-</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col s6 offset-s6">
                            <ul class="actions vertical small">
                                <input type="text" value="" name="rubros" id="rubros" hidden>
                                <li>
                                    <input type="submit" id="op" name="submit" class="button special small" data-target="modal1" value="Guardar" />
                                </li>

                            </ul>
                        </div>
                    </form>

                </div>
                <!-- Fin class=Container-->
            </div>
            <!-- Fin class=wrapper stylele -->
        </div>
        <!-- Fin class=page-wrapper -->
        <div>
            <?php
	
		include("footer.php");
    ?>
        </div>




        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">

                <label style=" color:#000; font-size:1rem" id="alertDat" for="mensaje">Label</label>
            </div>

            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>

            </div>
        </div>

        <script type="text/javascript">
            function comprobar_cuit(cuit) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("cambiar_cuit").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../logica/validar_cuit.php?cuit=" + cuit, true);
                xmlhttp.send();
            }

            function cargar() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("aca").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../logica/rubros.php", true);
                xmlhttp.send();
            }
        </script>
        <script type="text/javascript">
            function pasar() {
                obj = document.getElementById('sel1');
                if (obj.selectedIndex == -1) return;
                for (i = 0; opt = obj.options[i]; i++)
                    if (opt.selected) {
                        valor = opt.value; // almacenar value
                        txt = obj.options[i].text; // almacenar el texto
                        obj.options[i] = null; // borrar el item si está seleccionado
                        obj2 = document.getElementById('sel2');
                        if (obj2.options[0].value == '-') // si solo está la opción inicial borrarla
                            obj2.options[0] = null;
                        opc = new Option(txt, valor);
                        eval(obj2.options[obj2.options.length] = opc);
                    }
                if (obj.options.length == 0) {
                    opc = new Option("-", "-");
                    eval(obj.options[obj.options.length] = opc);
                }
            }
        </script>
        <script>
            function quitar() {
                obj = document.getElementById('sel2');
                if (obj.selectedIndex == -1) return;
                for (i = 0; opt = obj.options[i]; i++)
                    if (opt.selected) {
                        valor = opt.value; // almacenar value
                        txt = obj.options[i].text; // almacenar el texto
                        obj.options[i] = null; // borrar el item si está seleccionado
                        obj2 = document.getElementById('sel1');
                        if (obj2.options[0].value == '-') // si solo está la opción inicial borrarla
                            obj2.options[0] = null;
                        opc = new Option(txt, valor);
                        eval(obj2.options[obj2.options.length] = opc);
                    }
                if (obj.options.length == 0) {
                    opc = new Option("-", "-");
                    eval(obj.options[obj.options.length] = opc);
                }
            }
        </script>
        <script>
            function cargar_rubros() {

                rubros = new Array();
                for (var i = 0; i < document.getElementById("sel2").length; i++) {
                    rubros[i] = document.getElementById("sel2").options[i].value;
                }
                for (var j = 0; j < rubros.length; j++) {
                    document.getElementById("rubros").value = document.getElementById("rubros").value + rubros[j] + ";";
                }

            }
        </script>

        <!-- Scripts -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="../resources/js/materialize.js"></script>

        <script>
            $(document).ready(function () {
                $('select:not([multiple])').material_select();

            });
        </script>
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#op").click(function () {

                    var retorno = false;
                    var rubros = document.getElementById("sel2").options[0].value;
                    var localidad = document.getElementById('localidad').value;
                    var categoria = document.getElementById('categoria').value;
                    var escape = "seleccionar...";

                    if (localidad === escape && categoria === escape) {
                        $('#alertDat').text("Debe seleccionar una LOCALIDAD y una CATEGORIA");
                        $('#modal1').openModal();

                    } else if (localidad === escape) {
                        $('#alertDat').text("Debe seleccionar una LOCALIDAD");
                        $('#modal1').openModal();

                    } else if (categoria === escape) {
                        $('#alertDat').text("Debe seleccionar una CATEGORIA");
                        $('#modal1').openModal();
                    } else if (rubros === "-") {
                        $('#alertDat').text("Debe seleccionar al menos un RUBRO");
                        $('#modal1').openModal();
                    }
                    if (localidad !== escape && categoria !== escape && rubros !== "-") {
                        cargar_rubros();
                        retorno = true;
                    }
                    return retorno;



                });

                $("#cl").click(function () {
                    if ($("#example").val() === "") {
                        alert("Rellene todos los campos");
                    } else {
                        $('#modal1').closeModal();
                    }

                });
            });
        </script>

    </body>

    </html>