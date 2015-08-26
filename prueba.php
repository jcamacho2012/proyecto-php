<?php
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
<!DOCTYPE html>
<html>
    <head>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script>
            $(document).ready(function(){
               $('#provincia').change(function(){
                   var code=$(this).val();              
                   var data='code='+code;
                   
                   $.ajax({
                       type:"POST",
                       url:"fill.php",
                       data:data,
                       cache:false,
                       success:function(html){
                           $('#ciudad').html(html);
                       }
                   });                   
               });
            });
        </script>
    </head>
    <body>
        <form method="POST">
            <select name="provincia" id="provincia">
                <?php
                $cadena = "host='192.168.169.90' port='5432' dbname='inpdev_rrhh' user='postgres' password='1npb0n1t4'";
                $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
                $sql = "select * from ecuador_provincias order by nombre";
                $result = pg_query($sql) or die("Error sql" . pg_last_error());
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                    $lista = '<option value="' . $row['oid'] . '">' . $row['nombre'] . '		
                </option>';
                    echo $lista;
                }
               
                ?>
            </select>
            <br />
            <select name="ciudad" id="ciudad">
                <option selected="selected">Ciudades</option>
            </select>
        </form>
    </body>
</html>
