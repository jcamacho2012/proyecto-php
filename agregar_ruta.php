<?php
require ("class.php");
require ("listas.php");
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
<link rel="stylesheet" type="text/css" href="css/default.css"/>
</head>
<body>
    <div>
        <form id="formulario" method="post" action="" >
            <fieldset class="row2">
                <legend>Agregar Ruta
                </legend>
                <p>
                    <label>Tipo de Transporte
                    </label>
                    <select name="tipo"><?php echo lista_tipo_transporte()?></select>
                </p>
                 <p>
                    <label>Nombre de Transporte
                    </label>
                   <input type="text" name="nombre_transporte"/>
                </p>
                </fieldset>
             <fieldset class="row3">
                 <legend>Salida
                </legend>
                <p>
                 <label>Ciudad
                 </label>
                <select name="desde"><?php echo lista_ciudad()?></select>
                </p>
                 <p>
                 <label>Fecha
                 </label>
                 <input style="border: 1px solid #E1E1E1;" type="date" name="bday"/>
                </p>
                 <p>
                 <label>Hora
                 </label>
                <input style="border: 1px solid #E1E1E1;" type="time" name="bday"/>
                </p>
            <legend>Llegada
                </legend>
                <p>
                 <label>Ciudad
                 </label>
                <select name="desde"><?php echo lista_ciudad()?></select>
                </p>
                 <p>
                 <label>Fecha
                 </label>
                 <input style="border: 1px solid #E1E1E1;" type="date" name="bday"/>
                </p>
                 <p>
                 <label>Hora
                 </label>
                <input style="border: 1px solid #E1E1E1;" type="time" name="bday"/>
                </p>
             </fieldset>                                  	
            <input type="submit" name="Submit" value="Guardar" onclick="cerrar()"/>
		
	</form>
	
<?php 
if(isset($_POST['nombre'])){
	$salida=$_POST['nombre'];
	}
if(isset($_POST['direccion'])){
	$llegada=$_POST['direccion'];
	}
if(isset($_POST['Submit'])){
	if(empty($salida)==false and empty($llegada)==false){
            guardar_ruta($salida,$llegada); //returns omg lol;	
	
	}else{
		echo "valores vacios";
		}
}  

?>
        
    </div>    

</body>
</html> 