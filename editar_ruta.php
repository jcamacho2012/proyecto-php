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

list($tipo_transporte, $transporte, $salida_ciudad, $salida_fecha, $salida_hora, $llegada_ciudad, $llegada_fecha, $llegada_hora) = editar_registro($_GET['id']);

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
if (isset($_POST['actualizar'])) {    
    if (empty($tipo) == false and empty($nombre) == false and empty($salida_ciudad) == false and empty($salida_fecha) == false
            and empty($salida_hora) == false and empty($llegada_ciudad) == false and empty($llegada_fecha) == false
            and empty($llegada_hora) == false) {
        $confirmacion= actualizar_ruta($_GET['id'], $tipo, $nombre, $salida_ciudad, $salida_fecha, $salida_hora, $llegada_ciudad, $llegada_fecha, $llegada_hora); //returns omg lol;	
          if ($confirmacion == 1) {
           $valor="Actualizacion Exitosa!!";
        }else{
            $valor="Error";
        }
    } else {
        echo "valores vacios";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Editar Ruta</title>
        <script>
            function cerrar() {
                window.close();
            }
        </script>
        <meta charset="UTF-8"></meta>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <meta name="robots" content="ALL"/>
    </head>
    <body>
        <div>
            <form method="POST" action="" class="register">
                <h1>Editar Ruta</h1>            
                <fieldset class="row2">
                    <legend>Datos
                    </legend>
                    <p>
                        <label>Tipo de Transporte
                        </label>
                        <select name="tipo" id="tipo">
                            <?php echo lista_tipo_transporte($tipo_transporte) ?>
                        </select>
                    </p>
                    <p>
                        <label>Nombre de Transporte
                        </label>
                        <input type="text" class="long" name="nombre" value="<?php echo $transporte ?>"/>
                    </p>
                </fieldset> 
                <fieldset></fieldset>

                <fieldset class="row4">               
                    <legend> Salida
                    </legend>                                
                    <p>
                        <label>Ciudad *
                        </label>
                        <select name="salida_ciudad" id="provincia" >
                            <?php echo lista_ciudad('', $salida_ciudad) ?>
                        </select>                   
                    </p>
                    <p>
                        <label>Fecha de Salida
                        </label>
                        <input style="border: 1px solid #E1E1E1;" type="date" name="salida_fecha" value="<?php echo $salida_fecha ?>"/>
                    </p>
                    <p>
                        <label> Hora Salida
                        </label>
                        <input style="border: 1px solid #E1E1E1;" type="time" name="salida_hora" value="<?php echo $salida_hora ?>"/>
                    </p>
                </fieldset>
                <fieldset class="row5">
                    <legend> Llegada
                    </legend>                                
                    <p>
                        <label>Ciudad *
                        </label>
                        <select name="llegada_ciudad" id="provincia">
                            <?php echo lista_ciudad('', $llegada_ciudad) ?>
                        </select>                   
                    </p>
                    <p>
                        <label>Fecha de Salida
                        </label>
                        <input style="border: 1px solid #E1E1E1;" type="date" name="llegada_fecha" value="<?php echo $llegada_fecha ?>"/>
                    </p>
                    <p>
                        <label> Hora Salida
                        </label>
                        <input style="border: 1px solid #E1E1E1;" type="time" name="llegada_hora" value="<?php echo $llegada_hora ?>"/>
                    </p>  
                </fieldset>
                <br />          
                <br />
                <div> <input type="submit" class="button" name="actualizar" value="Actualizar" onclick="cerrar()" /></div>               
            </form>
              <?php 
            if($valor!=NULL){
                echo $valor;
            }
            ?>
        </div>    
    </body>
</html> 