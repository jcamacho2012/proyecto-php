<?php
require 'utilitarios/listas.php';
require 'utilitarios/class.php';


echo "tipo".$_POST['tipo']."<br />";
echo "nombre".$_POST['nombre']."<br />";
echo "salida_ciudad".$_POST['salida_ciudad']."<br />";
echo "salida_fecha".$_POST['salida_fecha']."<br />";
echo "salida_hora".$_POST['salida_hora']."<br />";
echo "llegada_ciudad".$_POST['llegada_ciudad']."<br />";
echo "llegada_fecha".$_POST['llegada_fecha']."<br />";
echo "llegada_hora".$_POST['llegada_hora']."<br />";
$resultado=  actualizar_ruta(37,$_POST['tipo'], $_POST['nombre'], $_POST['salida_ciudad'], $_POST['salida_fecha']
        , $_POST['salida_hora'], $_POST['llegada_ciudad'], $_POST['llegada_fecha'], $_POST['llegada_hora']); //returns omg lol;	       
        if($resultado==1){
            echo "registro guardado";
        }else{
            echo "Error";
        }
?>
