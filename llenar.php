<?php
include 'listas.php';
$cadena = "host='192.168.169.90' port='5432' dbname='inpdev_rrhh' user='postgres' password='1npb0n1t4'";
$con = pg_connect($cadena) or die("Error conexion" . pg_last_error());
$valor=$_GET['q'];
 $sql = "select oid from distributivo where apellidos_nombres like '%" . $valor . "%'  order by oid";
    $result = pg_query($sql) or die("Error sql" . pg_last_error());
    $datos=array();
    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
        $tmp=array('label'=>$row['oid']);
        $datos[]=$tmp; 
    }
   echo json_encode($datos);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$ak = array('label' => 'Alaska');
//$al = array('label' => 'Alabama');
//$ar = array('label' => 'Arkansas');
//
//$arr[0] = $ak;
//$arr[1] = $al;
//$arr[2] = $ar;
// 
//echo json_encode($arr);
