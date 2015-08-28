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

if (isset($_POST['nombre'])) {
    $salida = $_POST['nombre'];
}
if (isset($_POST['direccion'])) {
    $llegada = $_POST['direccion'];
}
if (isset($_POST['Submit'])) {
    if (empty($salida) == false and empty($llegada) == false) {
        guardar_ruta($salida, $llegada); //returns omg lol;	
    } else {
        echo "valores vacios";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.css"/>
        <!--        <link rel="stylesheet" type="text/css" href="css/default.css"/>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>     
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
            function cerrar() {
                window.close();
            }

            function fecha() {
                document.getElementById('datePicker').value = new Date().toDateInputValue();
            }
        </script>
    </head>
    <body>

        <form method="POST" action="" class="register">
            <h1>Agregar Nueva Ruta</h1>            
            <fieldset class="row2">
                <legend>Datos
                </legend>
                <p>
                    <label>Tipo de Transporte
                    </label>
                    <select name="tipo" id="tipo">
                        <?php echo lista_tipo_transporte() ?>
                    </select>
                </p>
                <p>
                    <label>Nombre de Transporte
                    </label>
                    <input type="text" class="long" />
                </p>
            </fieldset> 
            <fieldset></fieldset>

            <fieldset class="row4">               
                <legend> Salida
                </legend>                                
                <p>
                    <label>Ciudad *
                    </label>
                    <select name="provincia" id="provincia">
                        <?php echo lista_ciudad('') ?>
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
            </fieldset>
            <fieldset class="row5">
                <legend> Llegada
                </legend>                                
                <p>
                    <label>Ciudad *
                    </label>
                    <select name="provincia" id="provincia">
                        <?php echo lista_ciudad('') ?>
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
            </fieldset>
            <br />          
            <br />
            <div> <input type="submit" class="button" name="Submit" value="Guardar" onclick="cerrar()"/></div>
        </form>

    </body>
</html>
