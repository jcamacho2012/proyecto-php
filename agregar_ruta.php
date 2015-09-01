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
if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
}
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
}
if (isset($_POST['salida_ciudad'])) {
    $salida_ciudad = $_POST['salida_ciudad'];
}
if (isset($_POST['salida_fecha'])) {
    $salida_fecha = $_POST['salida_fecha'];
}
if (isset($_POST['salida_hora'])) {
    $salida_hora = $_POST['salida_hora'];
}
if (isset($_POST['llegada_ciudad'])) {
    $llegada_ciudad = $_POST['llegada_ciudad'];
}
if (isset($_POST['llegada_fecha'])) {
    $llegada_fecha = $_POST['llegada_fecha'];
}
if (isset($_POST['llegada_hora'])) {
    $llegada_hora = $_POST['llegada_hora'];
}
$valor="";
if (isset($_POST['Submit'])) {
    if (empty($tipo) == false and empty($nombre) == false and empty($salida_ciudad) == false and empty($salida_fecha) == false
            and empty($salida_hora) == false and empty($llegada_ciudad) == false and empty($llegada_fecha) == false
            and empty($llegada_hora) == false) {
        $confirmacion = guardar_ruta($tipo, $nombre, $salida_ciudad, $salida_fecha, $salida_hora, $llegada_ciudad, $llegada_fecha, $llegada_hora); //returns omg lol;	
        if ($confirmacion == 1) {
           $valor="Registro Exitoso!!";
        }else{
            $valor="Error";
        }
    } else {
        echo "valores vacios";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar Ruta</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.css"/>
        <!--        <link rel="stylesheet" type="text/css" href="css/default.css"/>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>               
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
                    <input type="text" class="long" name="nombre"/>
                </p>
            </fieldset> 
            <fieldset></fieldset>

            <fieldset class="row4">               
                <legend> Salida
                </legend>                                
                <p>
                    <label>Ciudad *
                    </label>
                    <select name="salida_ciudad" id="provincia">
                        <?php echo lista_ciudad('', 'default') ?>
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
            </fieldset>
            <fieldset class="row5">
                <legend> Llegada
                </legend>                                
                <p>
                    <label>Ciudad *
                    </label>
                    <select name="llegada_ciudad" id="provincia">
                        <?php echo lista_ciudad('') ?>
                    </select>                   
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
            <br />          
            <br />
            <div> <input type="submit" class="button" name="Submit" value="Guardar"/></div>
            <?php 
            if($valor!=NULL){
                echo $valor;
            }
            ?>
        </form>
    </body>
</html>