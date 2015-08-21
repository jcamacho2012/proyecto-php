<?php
require ("class.php");

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
$(document).ready(function(){
setInterval(function(){
$("#tableID").load('tabla_ruta.php');
}, 1000);
});
</script>
<script>
		function abrir() {							
			window.open("/proyecto-git-php/proyecto-php/agregar_ruta.php","","width=500,height=300");		
                }
                
                 function editar(id){
                    window.open("/proyecto-git-php/proyecto-php/editar_ruta.php?id="+id,"","width=500,height=300");
                }
                
                 function eliminar(id){
                  window.open("/proyecto-git-php/proyecto-php/eliminar_ruta.php?id="+id,"","width=500,height=300");                            
                }
                
                function cargar(){
                     var table = document.getElementById ("viajes");
                    table.refresh ();
                }
</script>
	</head>
<body>
<nav>
    <?php echo menu(); ?>	
</nav> 
    <div class="grupo">
        <h1>Ingreso de datos tabla</h1>
<!--        Salida: <input type="text" name="salida" id="salida" /><br />
        Llegada: <input type="text" name="llegada" id="llegada" /><br />-->
        <button type="submit" name="submitButton" id="submitButton" onclick="abrir()" >Agregar Ruta</button>
        <br />
        <br />
        
        <div id="tableID">
             <?php include_once'tabla_ruta.php'; ?>
            
        </div>        
    </div>
    
</body>
</html>
