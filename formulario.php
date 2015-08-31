<?php
require ("utilitarios/class.php");
require ("utilitarios/listas.php");

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

session_start();
if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    $oid = $_SESSION['id'];
    list($cedula, $nombre,$unidad,$puesto) = datos_usuario($oid);
} else {
    header("Location: /proyecto-git-php/proyecto-php/index.php");
    $nombre = "No has iniciado sesion";
}
?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script>
            $(document).ready(function () {
                setInterval(function () {
                    $("#tableID").load('utilitarios/tabla_ruta.php');
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
                        url: "utilitarios/fill.php",
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
                        url: "utilitarios/fill.php",
                        data: data,
                        cache: false,
                        success: function (html) {
                            $('#parroquia').html(html);
                        }
                    });
                });

                $('#coordinadorid').autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "utilitarios/fill.php",
                            type: "POST",
                            dataType: "json",
                            data: {q: request.term},
                            success: function (data) {
                                response(data);
                            }
                        });
                    },
                    minLength: 1,
//                    select: function (event, ui) {
//                        alert("Selecciono:" + ui.item.label);
//                    }
                });

                $('#direccionid').autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "utilitarios/fill.php",
                            type: "POST",
                            dataType: "json",
                            data: {q: request.term},
                            success: function (data) {
                                response(data);
                            }
                        });
                    },
                    minLength: 1,
//                    select: function (event, ui) {
//                        alert("Selecciono:" + ui.item.label);
//                    }
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

            function cerrar_sesion() {
                eliminar = confirm("¿Deseas cerrar tu sesion?");
                if (eliminar)
                    window.location.href = "/proyecto-git-php/proyecto-php/salir.php"; //página web a la que te redirecciona si confirmas la eliminación               
            }
        </script>
    </head>
    <body>
        <nav>
            <?php echo menu(); ?>            
        </nav>
        <p id="sesion"><?php echo $nombre; ?> - <a href="javascript:cerrar_sesion()">Cerrar Sesion</a></p>
        <form method="POST" action="login.php" class="register">
            <h1>Solicitud de Autorizacion para Cumplimiento de Servicios Institucionales</h1>
            <fieldset class="row1">
                <legend>
                </legend>
                <p>
                    <label>Nº solicitud de autorizacion
                    </label>
                    <input type="text" name="autorizacion"/>   
                    <label>Fecha de solicitud
                    </label>
                    <input  style="border: 1px solid #E1E1E1;" type="date" name="fecha_solicitud" value="<?php echo date('Y-m-d'); ?>" readonly=""/>
                </p>                
                <p>
                    <?php echo lista_tipo_viatico() ?>
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Datos Generales
                </legend>
                <p>
                    <label>Nombre Completo
                    </label>
                    <input type="text" class="long" value="<?php echo $nombre ?>"  readonly=""/>
                </p>
                <p>
                    <label>Unidad a que pertenece
                    </label>
                    <input type="text" class="long" value="<?php echo $unidad ?>" readonly=""/>
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
                    <input style="border: 1px solid #E1E1E1;" type="date" name="salida_fecha"/>
                </p>
                <p>
                    <label> Hora Salida
                    </label>
                    <input style="border: 1px solid #E1E1E1;" type="time" name="salida_hora"/>
                </p>
                <p>
                    <label>Fecha de Llegada
                    </label>
                    <input style="border: 1px solid #E1E1E1;" type="date" name="llegada_fecha"/>
                </p>
                <p>
                    <label> Hora Llegada
                    </label>
                    <input style="border: 1px solid #E1E1E1;" type="time" name="llegada_hora"/>
                </p>

            </fieldset>
            <fieldset class="row3">
                <legend>
                </legend>
                <p></p> <p></p>
                <p>
                    <label>Cedula
                    </label>
                    <input type="text" maxlength="10" value="<?php echo $cedula ?>" readonly=""/>
                </p>
                <p>
                    <label>Puesto
                    </label>
                    <input type="text" class="long" value="<?php echo $puesto ?>" readonly=""/>
                </p>
                <p>
                    <label>Integrantes
                    </label>
                    <textarea  name="integrantes" placeholder="text" class="textarea" style="resize:none; border: 1px solid #E1E1E1;" rows="4" cols="50" >
                       
                    </textarea>
                </p>
                <p>
                    <label>Descripcion
                    </label>
                    <textarea name="descripcion" class="textarea" style="resize:none; border: 1px solid #E1E1E1;" rows="4" cols="50">
                       
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
                    <?php include_once 'utilitarios/tabla_ruta.php'; ?>  
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
                    <input type="text" class="long" name="nombre_banco" value="Banco del Pichincha"/>
                </p>

                <p>
                    <label>Tipo de cuenta
                    </label>
                    <input type="text" class="long" name="tipo_cuenta" value="Ahorro" />
                </p>  
                <p>
                    <label>Numero de cuenta
                    </label>
                    <input type="text" class="long" name="numero_cuenta" value="562145265" />
                </p>           
            </fieldset>
            <br />
            <fieldset class="row6">
                <br />
                <legend> Firmas para Autorizacion
                </legend>
                <p>
                    <label>Coordinador 
                    </label>
                    <input type="text" id="coordinadorid" name="unidad">   
                    <label>Encargado(a)? 
                    </label>
                    <input type="checkbox" value="true" name="unidad_chk"/>
                </p> 
                <p>
                    <label>Direccion 
                    </label>
                    <input type="text" id="direccionid" name="autoridad" > 
                    <label>Encargado(a)? 
                    </label>
                    <input type="checkbox" value="true" name="autoridad_chk"/>
                </p>    
            </fieldset>
            <br />
            <div><button class="button" type="submit">Crear solicitud &raquo;</button></div>
        </form>        
    </body>
</html>
