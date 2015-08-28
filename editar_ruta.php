<?php
require ("utilitarios/class.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Prueba</title>
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
            <?php
            echo editar_registro($_GET['id']);

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