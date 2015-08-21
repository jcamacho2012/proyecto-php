<?php
require ("class.php");
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
        <form id="formulario" method="post" action="" style="display:block">
		<p>Salida: <input type="text" name="nombre"></p>
		</p>Llegada: <input type="text" name="direccion"></p>	
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