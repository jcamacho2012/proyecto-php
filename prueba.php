<?php
include 'listas.php';
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
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>           
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#busca').autocomplete({
                    source: function(request,response){
                        $.ajax({
                           url:"fill.php",
                           dataType:"json",
                           data:{q:request.term},
                           success: function(data){
                               response(data);
                           }
                        });
                    },
                    minLength:1,
                    select:function(event,ui){
                        alert("Selecciono:"+ui.item.label);
                    }
                });
            });
        </script>
      
    </head>
    <body>
        <label for="apellidos">Apellidos</label> 
        <input type="text" id="busca">          
    </body>
</html>
