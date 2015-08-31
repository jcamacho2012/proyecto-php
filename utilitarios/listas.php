<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
$con = pg_connect($cadena) or die("Error conexion" . pg_last_error());

function crear_solicitud($numero, $fecha,$provincia,$ciudad,$salida_fecha,$salida_hora,$llegada_fecha,$llegada_hora,$integrantes,$descripcion,$nombre_banco,$tipo_cuenta,$numero_cuenta,$unidad,$unidad_chk,$autoridad,$autoridad_chk) {
    if($unidad_chk!="true"){
        $unidad_chk="false";
    }
     if($autoridad_chk!="true"){
        $autoridad_chk="false";
    }
    $cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
    $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
    $sql = "insert into solicitud(numero_autorizacion,fecha_solicitud,tipo_viatico,oid_distributivo,provincia_solicitud,ciudad_solicitud,salida_fecha,salida_hora,"
            . "llegada_fecha,llegada_hora,integrantes,descripcion,oid_ruta,nombre_banco,tipo_cuenta,numero_cuenta,user_unidad,unidad_chk,user_autoridad,autoridad_chk)"
            . "values('" . $numero . "','" . $fecha . "','1','214','".$provincia."','".$ciudad."','".$salida_fecha."','".$salida_hora."','".$llegada_fecha."','".$llegada_hora."'"
            . ",'".$integrantes."','".$descripcion."','1','".$nombre_banco."','".$tipo_cuenta."','".$numero_cuenta."',"
            . "'".$unidad."','".$unidad_chk."','".$autoridad."','".$autoridad_chk."');";
    $result = pg_query($sql) or die("Error sql" . pg_last_error());
    if (!$result) {
        $valor = 0;
        exit;
    } else {
        $valor = 1;
    }
    pg_close();
    return $valor;
}

function lista_usuarios($valor) {
    $valor = strtoupper($valor);
    $sql = "select oid,apellidos_nombres from distributivo where apellidos_nombres like '%" . $valor . "%'  order by oid";
    $result = pg_query($sql) or die("Error sql" . pg_last_error());
    $datos = array();
    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
        $tmp = array('label' => $row['apellidos_nombres']);
        $datos[] = $tmp;
    }
    echo json_encode($datos);
}

function lista_tipo_viatico() {
    $cadena = "host='192.168.169.90' port='5432' dbname='solicitudes' user='postgres' password='1npb0n1t4'";
    $con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
    $lista = '<br />';
    $sql = "select oid,nombre from viatico_tipo order by oid";
    $result = pg_query($sql) or die("Error sql" . pg_last_error());
    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
        $lista .= '<label>' . $row['nombre'] . ' 
                   </label>
                    <input type="checkbox" value="' . $row['oid'] . '" />';
    }
    return $lista;
}

function lista_provincia() {
    $sql = "select * from ecuador_provincias order by nombre";
    $result = pg_query($sql) or die("Error sql" . pg_last_error());
    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
        $lista .= '<option value="' . $row['oid'] . '">' . $row['nombre'] . '		
            </option>';
    }
    return $lista;
}

function lista_ciudad($id) {
    if ($id) {
        $sql = "select * from ecuador_cantones where provincia_oid=" . $id . " order by nombre";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            $lista .= '<option value="' . $row['oid'] . '">' . $row['nombre'] . '		
            </option>';
        }
    } else {
        $sql = "select * from ecuador_cantones order by nombre";
        $result = pg_query($sql) or die("Error sql" . pg_last_error());
        while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
            $lista .= '<option value="' . $row['oid'] . '">' . $row['nombre'] . '		
            </option>';
        }
    }
    return $lista;
}

function lista_parroquia($id) {
    $sql = "select * from ecuador_parroquias where canton_oid=" . $id . " order by nombre";
    $result = pg_query($sql) or die("Error sql" . pg_last_error());
    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
        $lista .= '<option value="' . $row['oid'] . '">' . $row['nombre'] . '		
            </option>';
    }
    return $lista;
}

function lista_coordinador() {
    $retval = '<option>
               </option>
               <option value="1">coordinador		
               </option>';
    return $retval;
}

function lista_tipo_transporte() {
    $retval = '<option>
               </option>
               <option value="1">Aereo</option>
               <option value="2">Terrestre</option>
               <option value="3">Maritimo</option>
               ';
    return $retval;
}

function lista_direccion() {
    $retval = '<option>
               </option>
               <option value="1">direccion		
               </option>';
    return $retval;
}
