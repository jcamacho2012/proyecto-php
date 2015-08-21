
<?php

$cadena="host='192.168.169.90' port='5432' dbname='postgres' user='postgres' password='1npb0n1t4'";
$con=  pg_connect($cadena) or die("Error conexion".  pg_last_error());
$sql="select * from ruta"; 
$result=  pg_query($sql) or die("Error sql".  pg_last_error());
$cont=  pg_num_rows($result);
if($cont!=0){  
    echo "<table border='1' id='tableID'>";
    while($row=  pg_fetch_array($result,NULL,PGSQL_ASSOC)){
        echo '
	<tr bgcolor=#CEE3F6>
		<td>' . $row['salida'] . '</td>
		<td align="center">' . $row['llegada'] . '</td>		
		<td><img src="images/edit.png" onclick="editar(' . $row['id'] . ')"></td>
		<td><a href="index.php?op=e&id=' . $row['id'] . '"><img src="images/borrar.png"></a></td>
	</tr>';  
        
        }
       
    echo "</table>";
 }else{
        echo"<tr><td>No existen registros</td><td>";
    }