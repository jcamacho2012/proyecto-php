<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$cadena = "host='192.168.169.90' port='5432' dbname='inpdev_rrhh' user='postgres' password='1npb0n1t4'";
$con = pg_connect($cadena) or die("Error conexion" . pg_last_error());


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
    $sql = "select * from ecuador_cantones where provincia_oid=" . $id . " order by nombre";
    $result = pg_query($sql) or die("Error sql" . pg_last_error());
    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
        $lista .= '<option value="' . $row['oid'] . '">' . $row['nombre'] . '		
            </option>';
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
