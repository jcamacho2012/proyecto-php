<?php
require ("utilitarios/class.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Eliminar Ruta</title>
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
        <h1>¿Desea eliminar el siguiente registro?</h1>
        <div>
            <?php
            echo eliminar_registro($_GET['id']);
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            }
            if (isset($_POST['eliminar'])) {
                if (empty($id) == false) {
                    eliminar_ruta($id); //returns omg lol;	
                } else {
                    echo "valores vacios";
                }
            }
            ?>

        </div>    

    </body>
</html> 