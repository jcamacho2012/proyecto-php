<?php
require ("class.php");
require ("listas.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');
// Motrar todos los errores de PHP
error_reporting(-1);

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
error_reporting(E_ALL);

// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                setInterval(function () {
                    $("#tableID").load('tabla_ruta.php');
                }, 1000);
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#provincia').change(function () {
                    var code = $(this).val();
                    var data = 'provincia=' + code;

                    $.ajax({
                        type: "POST",
                        url: "fill.php",
                        data: data,
                        cache: false,
                        success: function (html) {
                            $('#ciudad').html(html);
                        }
                    });
                });

                $('#ciudad').change(function () {
                    var code = $(this).val();
                    var data = 'ciudad=' + code;

                    $.ajax({
                        type: "POST",
                        url: "fill.php",
                        data: data,
                        cache: false,
                        success: function (html) {
                            $('#parroquia').html(html);
                        }
                    });
                });
            });
        </script>
        <script>            
            function abrir() {
                window.open("/proyecto-git-php/proyecto-php/agregar_ruta.php", "", "width=500,height=300");
            }

            function editar(id) {
                window.open("/proyecto-git-php/proyecto-php/editar_ruta.php?id=" + id, "", "width=500,height=300");
            }

            function eliminar(id) {
                window.open("/proyecto-git-php/proyecto-php/eliminar_ruta.php?id=" + id, "", "width=500,height=300");
            }

            function cargar() {
                var table = document.getElementById("viajes");
                table.refresh();
            }

            function fecha() {
                document.getElementById('datePicker').value = new Date().toDateInputValue();
            }
        </script>
    </head>
    <body>
        <nav>
            <?php echo menu(); ?>	
        </nav> 
        <form method="POST" action="" class="register">
            <h1>Solicitud de Autorizacion para Cumplimiento de Servicios Institucionales</h1>
            <fieldset class="row1">
                <legend>
                </legend>
                <p>
                    <label>Nº solicitud de autorizacion
                    </label>
                    <input type="text"/>   
                    <label>Fecha de solicitud
                    </label>
                    <input  style="border: 1px solid #E1E1E1;" type="date" name="fecha_solicitud" value="<?php echo date('Y-m-d'); ?>" readonly=""/>
                </p>                
                <p>
                    <label>Viaticos 
                    </label>
                    <input type="checkbox" value="" />
                    <label>Movilizaciones 
                    </label>
                    <input type="checkbox" value="" />
                    <label>Subsistencias 
                    </label>
                    <input type="checkbox" value="" />
                    <label>Alimentacion 
                    </label>
                    <input type="checkbox" value="" />
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Datos Generales
                </legend>
                <p>
                    <label>Nombre Completo
                    </label>
                    <input type="text" class="long" value="NN NN"  readonly=""/>
                </p>
                <p>
                    <label>Unidad a que pertenece
                    </label>
                    <input type="text" class="long" value="Gestion de Procesos" readonly=""/>
                </p>

                <p>
                    <label>Provincia *
                    </label>
                    <select name="provincia" id="provincia">
                        <?php echo lista_provincia() ?>
                    </select>                   
                </p>
                <p>
                    <label>Ciudad *
                    </label>
                    <select name="ciudad" id="ciudad">
                        <option selected="selected">Seleccione Provincia</option> 
                    </select>
                </p>
                <p>
                    <label>Parroquia *
                    </label>
                    <select name="parroquia" id="parroquia">  
                        <option selected="selected">Seleccione Ciudad</option> 
                    </select>
                </p>
                <p>
                    <label>Fecha de Salida
                    </label>
                    <input style="border: 1px solid #E1E1E1;" type="date" name="bday"/>
                </p>
                <p>
                    <label> Hora Salida
                    </label>
                    <input style="border: 1px solid #E1E1E1;" type="time" name="bday"/>
                </p>
                <p>
                    <label>Fecha de Llegada
                    </label>
                    <input style="border: 1px solid #E1E1E1;" type="date" name="bday"/>
                </p>
                <p>
                    <label> Hora Llegada
                    </label>
                    <input style="border: 1px solid #E1E1E1;" type="time" name="bday"/>
                </p>

            </fieldset>
            <fieldset class="row3">
                <legend>
                </legend>
                <p></p> <p></p>
                <p>
                    <label>Cedula
                    </label>
                    <input type="text" maxlength="10" value="0927619858" readonly=""/>
                </p>
                <p>
                    <label>Puesto
                    </label>
                    <input type="text" class="long" value="Servidor Publico 3" readonly=""/>
                </p>
                <p>
                    <label>Integrantes
                    </label>
                    <textarea  placeholder="text" class="textarea" style="resize:none; border: 1px solid #E1E1E1;" rows="4" cols="50" >
                       
                    </textarea>
                </p>
                <p>
                    <label>Descripcion
                    </label>
                    <textarea class="textarea" style="resize:none; border: 1px solid #E1E1E1;" rows="4" cols="50">
                       
                    </textarea>
                </p>  
                <br />
                <br />
            </fieldset>            
            <fieldset class="row4">               
                <legend> Datos de Transporte
                </legend>
                <p class="agreement">
                    <button  type="button" name="submitButton" id="submitButton" onclick="abrir()" >Agregar Ruta</button>
                </p>   
                <p class="agreement">
                <div id="tableID">
                    <?php include_once'tabla_ruta.php'; ?>  
                </div>     
                </p>                       
            </fieldset>
            <fieldset class="row5">
                <legend> Datos para Transferencia
                </legend>
                <br />
                <p>
                    <label>Nombre del Banco
                    </label>
                    <input type="text" class="long" value="Banco del Pichincha"/>
                </p>

                <p>
                    <label>Tipo de cuenta
                    </label>
                    <input type="text" class="long" value="Ahorro" />
                </p>  
                <p>
                    <label>Numero de cuenta
                    </label>
                    <input type="text" class="long" value="562145265" />
                </p>           
            </fieldset>
            <br />
            <fieldset class="row6">
                <br />
                <legend> Firmas para Autorización
                </legend>
                <p>
                    <label>Coordinador 
                    </label>
                    <input type="text" id="coordinadorid" onkeyup="autocomplet()">
                    <ul id="coordinador_list_id"></ul>                                  
                </p> 
                <p>
                    <label>Direccion 
                    </label>
                   <input type="text" id="direccionid" onkeyup="autocomplet()">
                    <ul id="direccion_list_id"></ul>                  
                </p>    
            </fieldset>
            <br />
            <div><button class="button">Crear solicitud &raquo;</button></div>
        </form>

    </body>
</html>
