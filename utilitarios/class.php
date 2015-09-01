<script>
    function cerrar() {
        window.close();
    }
</script>

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$cadena = "host='192.168.169.90' port='5432' dbname='postgres' user='postgres' password='1npb0n1t4'";
$con = pg_connect($cadena) or die("Error conexion" . pg_last_error());

function login($username, $password) {
    if ($username != NULL && $password != NULL) {
        $cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
        $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
        $sql = "select oid from \"user\" where username='" . $username . "' and password='" . $password . "';";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            $cont = $row['oid'];
        }
        pg_close($con);
        return $cont;
    }
}

function datos_usuario($oid) {
    $cedula = "";
    $nombre = "";
    $unidad = "";
    $puesto = "";
    if ($oid != NULL) {
        $cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
        $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
        //$sql = "select cedula,apellidos_nombres ,estado_puesto rom distributivo where oid='" . $oid . "';";
        $sql = "select cedula as cedula,apellidos_nombres as nombre,a.nombre as unidad,c.nombre as puesto from distributivo d ,area a,cargo c where d.oid='" . $oid . "' and d.area_oid=a.oid and d.cargo_oid=c.oid";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            $cedula = $row['cedula'];
            $nombre = $row['nombre'];
            $unidad = $row['unidad'];
            $puesto = $row['puesto'];
        }
        pg_close($con);
        return array($cedula, $nombre, $unidad, $puesto);
    }
}

function actualizar_ruta($id, $tipo, $nombre, $salida_ciudad, $salida_fecha, $salida_hora, $llegada_ciudad, $llegada_fecha, $llegada_hora) {
    if ($id != NULL && $tipo != NULL && $nombre != NULL && $salida_ciudad != NULL && $salida_fecha != NULL && $salida_hora != NULL && $llegada_ciudad != NULL && $llegada_fecha != NULL && $llegada_hora != NULL) {
        $cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
        $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
        $sql = "(select nombre from ecuador_cantones where oid=" . $salida_ciudad . ")";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        $row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
        $nombre_ciudad_salida = $row['nombre'];
        $sql = "(select nombre from ecuador_cantones where oid=" . $llegada_ciudad . ")";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        $row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
        $nombre_ciudad_llegada = $row['nombre'];
        $sql = "UPDATE ruta
   SET  tipo_transporte=" . $tipo . ", nombre_transporte='" . $nombre . "', salida_ciudad='" . $nombre_ciudad_salida . "', 
       salida_fecha='" . $salida_fecha . "', salida_hora='" . $salida_hora . "', llegada_ciudad='" . $nombre_ciudad_llegada . "', llegada_fecha='" . $llegada_fecha . "', 
       llegada_hora='" . $llegada_hora . "'
        WHERE oid=" . $id . ";";
         $result = pg_query($sql) or die("Error sql" . pg_last_error());
       // echo $sql;
        if (!$result) {
            $valor = 0;
            exit;
        } else {
            $valor = 1;
        }
        var_dump($result);
        pg_close($con);
    } else {
        echo"cadena vacia desde la funcion guardar_ruta";
    }
    return $valor;
}

function eliminar_ruta($id) {
    $cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
    $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
    if ($id != NULL) {
        $sql = "DELETE FROM ruta WHERE oid=" . $id . ";";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        var_dump($result);
        pg_close($con);
    } else {
        echo"cadena vacia desde la funcion eliminar_ruta";
    }
}

function guardar_ruta($tipo, $nombre, $salida_ciudad, $salida_fecha, $salida_hora, $llegada_ciudad, $llegada_fecha, $llegada_hora) {
    if ($tipo != NULL && $nombre != NULL && $salida_ciudad != NULL && $salida_fecha != NULL && $salida_hora != NULL && $llegada_ciudad != NULL && $llegada_fecha != NULL && $llegada_hora != NULL) {
        $cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
        $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
        $sql = "INSERT INTO ruta(
            tipo_transporte, nombre_transporte, salida_ciudad, salida_fecha, 
            salida_hora, llegada_ciudad, llegada_fecha, llegada_hora)
    VALUES (" . $tipo . ", '" . $nombre . "', (select nombre from ecuador_cantones where oid=" . $salida_ciudad . "), '" . $salida_fecha . "', 
            '" . $salida_hora . "', (select nombre from ecuador_cantones where oid=" . $llegada_ciudad . "), '" . $llegada_fecha . "', '" . $llegada_hora . "');";

        //$sql = "INSERT INTO ruta(salida, llegada) VALUES ('" . $salida . "','" . $llegada . "');";
        //$sql="select * from ruta where oid=".$id.";";
        //echo $sql;       
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        // var_dump($result);
        if (!$result) {
            $valor = 0;
            exit;
        } else {
            $valor = 1;
        }
    } else {
        echo"cadena vacia desde la funcion guardar_ruta";
    }
    pg_close();
    return $valor;
}

function editar_registro($id) {
    $tipo_transporte = "";
    $transporte = "";
    $salida_ciudad = "";
    $salida_fecha = "";
    $salida_hora = "";
    $llegada_ciudad = "";
    $llegada_fecha = "";
    $llegada_hora = "";
    $cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
    $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
    $sql = "select tipo_transporte,nombre_transporte,salida_ciudad,salida_fecha,salida_hora,llegada_ciudad,llegada_fecha,llegada_hora from ruta r, transporte_tipo t where r.tipo_transporte=t.oid and r.oid=" . $id . ";";
    $res = pg_query($sql) or die("Error sql" . pg_last_error());
    while ($row = pg_fetch_array($res, NULL, PGSQL_ASSOC)) {
        $tipo_transporte = $row['tipo_transporte'];
        $transporte = $row['nombre_transporte'];
        $salida_ciudad = $row['salida_ciudad'];
        $salida_fecha = $row['salida_fecha'];
        $salida_hora = $row['salida_hora'];
        $llegada_ciudad = $row['llegada_ciudad'];
        $llegada_fecha = $row['llegada_fecha'];
        $llegada_hora = $row['llegada_hora'];
    }
    pg_close($con);

    return array($tipo_transporte, $transporte, $salida_ciudad, $salida_fecha, $salida_hora, $llegada_ciudad, $llegada_fecha, $llegada_hora);
}

function eliminar_registro($id) {
    $cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
    $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
    //$sql = "SELECT * FROM ruta WHERE id=" . $id . ";";
    $sql = "select r.oid as id,t.nombre as nombre,nombre_transporte,salida_ciudad,salida_fecha,salida_hora,llegada_ciudad,llegada_fecha,llegada_hora from ruta r, transporte_tipo t where r.tipo_transporte=t.oid and r.oid=" . $id . ";";
    $res = pg_query($sql) or die("Error sql" . pg_last_error());
    $row = pg_fetch_array($res, NULL, PGSQL_ASSOC);

    $retval = '
	<form name="contacto" action="" method="POST">
	<input type="hidden" name="id" value="' . $row['id'] . '"/>
	<table align="center">
                        <tr>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Ruta</th>
                            <th colspan=\'2\'>Salida</th>
                            <th colspan=\'2\'>Llegada</th>                            
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Fecha</th>
                            <th>Hora</th>                            
                        </tr>
                        <tr bgcolor=#CEE3F6>                            
                            <td>' . $row['nombre'] . '</td>
                            <td>' . $row['nombre_transporte'] . '</td>
                            <td>' . $row['salida_ciudad'] . '-' . $row['llegada_ciudad'] . '</td>
                            <td>' . $row['salida_fecha'] . '</td>
                            <td>' . $row['salida_hora'] . '</td>
                            <td align="center">' . $row['llegada_fecha'] . '</td>	
                            <td align="center">' . $row['llegada_hora'] . '</td>	                            
                        </tr>	
			<tr>
                            <td colspan=2 align="center"><input type="submit" name="eliminar" value="Eliminar" onclick="cerrar()"</td>
                            <td colspan=2 align="center"><input type="submit" name="cancela" value="Cancelar" onclick="cerrar()"></td>
			</tr>								
		</table>
		</form>';
    return $retval;
}

function consultar() {

    $sql = "select * from ruta";

    $result = pg_query($sql) or die("Error sql" . pg_last_error());

    $cont = pg_num_rows($result);
    echo '$cont';
    if ($cont != 0) {
        while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            $retval .= '
	<tr bgcolor=#CEE3F6>
		<td>' . $row['salida'] . '</td>
		<td align="center">' . $row['llegada'] . '</td>		
		<td><a href="index.php?op=a&id=' . $row['id'] . '"><img src="images/edit.png"></a></td>
		<td><a href="index.php?op=e&id=' . $row['id'] . '"><img src="images/borrar.png"></a></td>
	</tr>';
        }
    } else {
        echo"<tr><td>No existen registros</td><td>";
    }
    //echo"<hr/>".$cont."registros encontrados";
    return $retval;
}

function menu() {
    $retval = '<ul>
		<li><a title=\"Solicitud\" href=>Solicitud de Comision</a></li>
		<li><a title=\"Informe\" href=>Informe de Comision</a></li>
		
	</ul>';

    return $retval;
}
?>