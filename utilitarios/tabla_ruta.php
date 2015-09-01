
<?php

$cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
$con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
$sql = "select r.oid as id,t.nombre as nombre,nombre_transporte,salida_ciudad,salida_fecha,salida_hora,llegada_ciudad,llegada_fecha,llegada_hora from ruta r, transporte_tipo t where r.tipo_transporte=t.oid";
$result = pg_query($sql) or die("Error sql" . pg_last_error());
$cont = pg_num_rows($result);
if ($cont != 0) {
    echo "<table id='tableID'> <tr>"
    . "<th style=\"display:none;\">ID</th>"
    . "<th>Tipo</th>"
    . "<th>Nombre</th>"
    . "<th>Ruta</th>"
    . "<th colspan='2'>Salida</th>"
    . "<th colspan='2'>Llegada</th>"
    . "<th colspan='2'>Acciones</th>"
    . "</tr>"
    . "<tr>"
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
    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
        echo '
	<tr bgcolor=#CEE3F6>
                <td style="display:none;">' . $row['id'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['nombre_transporte'] . '</td>
                <td>' . $row['salida_ciudad'] . '-' . $row['llegada_ciudad'] . '</td>
		<td>' . $row['salida_fecha'] . '</td>
                <td>' . $row['salida_hora'] . '</td>
		<td align="center">' . $row['llegada_fecha'] . '</td>	
                <td align="center">' . $row['llegada_hora'] . '</td>	
		<td><img src="images/edit.png" onclick="editar(' . $row['id'] . ')"></td>
                <td><img src="images/borrar.png" onclick="eliminar(' . $row['id'] . ')"></td>		
	</tr>';
    }

    echo "</table>";
} else {
    echo"<tr><td>No existen registros</td><td>";
}