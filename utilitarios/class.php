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

function login($id, $provincia) {
    if ($id != NULL && $provincia != NULL) {
        $cadena = "host='192.168.169.90' port='5432' dbname='postgres' user='postgres' password='1npb0n1t4'";
        $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
        $sql = "select * from ruta where oid=" . $id . ";";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        $cont = pg_num_rows($result);
        pg_close($con);
        return $cont;
    }
}

function actualizar_ruta($id, $salida, $llegada) {
    if ($salida != NULL && $llegada != NULL && $id != NULL) {
        $sql = "UPDATE ruta SET salida='" . $salida . "', llegada='" . $llegada . "' WHERE id=" . $id . ";";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        var_dump($result);
        pg_close($con);
        //return $cont;
    } else {
        echo"cadena vacia desde la funcion guardar_ruta";
    }
}

function eliminar_ruta($id) {
    if ($id != NULL) {
        $sql = "DELETE FROM ruta WHERE id=" . $id . ";";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        var_dump($result);
        pg_close($con);
        //return $cont;
    } else {
        echo"cadena vacia desde la funcion eliminar_ruta";
    }
}

function guardar_ruta($salida, $llegada) {
    if ($salida != NULL && $llegada != NULL) {
        $sql = "INSERT INTO ruta(salida, llegada) VALUES ('" . $salida . "','" . $llegada . "');";
        //$sql="select * from ruta where oid=".$id.";";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        var_dump($result);
        //
        //return $cont;
    } else {
        echo"cadena vacia desde la funcion guardar_ruta";
    }
}

function editar_registro($id) {
    $sql = "SELECT * FROM ruta WHERE id=" . $id . ";";
    $res = pg_query($sql) or die("Error sql" . pg_last_error());
    $row = pg_fetch_array($res, NULL, PGSQL_ASSOC);

    $retval = '
	<form name="contacto" action="" method="POST">
	<input type="hidden" name="id" value="' . $row['id'] . '"/>
	<table align="center" border=0>
			<tr>
				<td colspan="2" align="center"><b>Datos de Ruta</b></td>
			</tr>
			<tr>
				<td><b>Salida: </b></td>
				<td><input type="text"  name="salida" value="' . $row['salida'] . '"></td>
			</tr>
			<tr>
				<td><b>Llegada: </b></td>
				<td><input type="text"  name="llegada" size="2" value="' . $row['llegada'] . '"></td>
			</tr>			
			<tr>
				<td colspan=2 align="center"><input type="submit" name="envia" value="Guardar" onclick="cerrar()"></td>                                
			</tr>								
		</table>
		</form>';
    return $retval;
}

function eliminar_registro($id) {
    $sql = "SELECT * FROM ruta WHERE id=" . $id . ";";
    $res = pg_query($sql) or die("Error sql" . pg_last_error());
    $row = pg_fetch_array($res, NULL, PGSQL_ASSOC);

    $retval = '
	<form name="contacto" action="" method="POST">
	<input type="hidden" name="id" value="' . $row['id'] . '"/>
	<table align="center" border=0>
			<tr>
				<td colspan="2" align="center"><b>Dese eliminar el siguiente registro?</b></td>
			</tr>
			<tr>
				<td><b>Salida: </b></td>
				<td><input type="text" readonly="readonly" name="salida" value="' . $row['salida'] . '"></td>
			</tr>
			<tr>
				<td><b>Llegada: </b></td>
				<td><input type="text" readonly="readonly" name="llegada" size="2" value="' . $row['llegada'] . '"></td>
			</tr>			
			<tr>
				<td colspan=2 align="center"><input type="submit" name="envia" value="Eliminar" onclick="cerrar()"></td>
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