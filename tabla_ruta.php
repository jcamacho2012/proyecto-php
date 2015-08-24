
<?php

$cadena="host='192.168.169.90' port='5432' dbname='postgres' user='postgres' password='1npb0n1t4'";
$con=  pg_connect($cadena) or die("Error conexion".  pg_last_error());
$sql="select * from ruta"; 
$result=  pg_query($sql) or die("Error sql".  pg_last_error());
$cont=  pg_num_rows($result);
if($cont!=0){  
    echo "<table id='tableID'> <tr>"
    . "<th>Tipo</th>"
    . "<th>Nombre</th>"
    . "<th>Ruta</th>"
    . "<th colspan='2'>Salida</th>" 
    . "<th colspan='2'>Llegada</th>"    
    . "<th colspan='2'>Acciones</th>"
    . "</tr>"
    ."<tr>"
    . "<th></th>"
    . "<th></th>"
    . "<th></th>"
    . "<th>Fecha</th>"
    . "<th>Hora</th>" 
    . "<th>Fecha</th>"
    . "<th>Hora</th>"    
    . "<th></th>"
    . "<th></th>"
    . "</tr>";
    while($row=  pg_fetch_array($result,NULL,PGSQL_ASSOC)){
        echo '
	<tr bgcolor=#CEE3F6>
                <td>TIPO</td>
                <td>NOMBRE</td>
                <td>RUTA</td>
		<td>' . $row['salida'] . '</td>
                <td>' . $row['salida'] . '</td>
		<td align="center">' . $row['llegada'] . '</td>	
                <td align="center">' . $row['llegada'] . '</td>	
		<td><img src="images/edit.png" onclick="editar(' . $row['id'] . ')"></td>
                <td><img src="images/borrar.png" onclick="eliminar(' . $row['id'] . ')"></td>		
	</tr>';  
        
        }
       
    echo "</table>";
 }else{
        echo"<tr><td>No existen registros</td><td>";
    }