<?php
require 'utilitarios/listas.php';

echo "unidad".$_POST['unidad']."<br />";
echo "unidad_chk".$_POST['unidad_chk']."<br />";
echo "autoridad".$_POST['autoridad']."<br />";
echo "autoridad_chk".$_POST['autoridad_chk']."<br />";
$resultado=crear_solicitud($_POST['autorizacion'], $_POST['fecha_solicitud'],$_POST['provincia'],$_POST['ciudad'],
        $_POST['salida_fecha'],$_POST['salida_hora'],$_POST['llegada_fecha'],$_POST['llegada_hora'],$_POST['integrantes'],
        $_POST['descripcion'],$_POST['nombre_banco'],$_POST['tipo_cuenta'],$_POST['numero_cuenta'],$_POST['unidad'],
        $_POST['unidad_chk'],$_POST['autoridad'],$_POST['autoridad_chk']);
        if($resultado==1){
            echo "registro guardado";
        }else{
            echo "Error";
        }
?>
