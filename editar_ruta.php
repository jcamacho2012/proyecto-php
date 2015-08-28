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
                        <?php echo lista_tipo_transporte() ?>
                    </select>
                </p>
                <p>
                    <label>Nombre de Transporte
                    </label>
                    <input type="text" class="long" value='.$prueba.'>
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
//                           <?php echo lista_ciudad('') ?>
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
            <?php
          //  echo editar_registro($_GET['id']);

            if (isset($_POST['salida'])) {
                $salida = $_POST['salida'];
            }
            if (isset($_POST['llegada'])) {
                $llegada = $_POST['llegada'];
            }
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            }
            if (isset($_POST['envia'])) {
                if (empty($salida) == false and empty($llegada) == false and empty($id) == false) {
                    actualizar_ruta($id, $salida, $llegada); //returns omg lol;	
                } else {
                    echo "valores vacios";
                }
            }
            ?>

        </div>    

    </body>
</html> 