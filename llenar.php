<?php
include 'utilitarios/listas.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Motrar todos los errores de PHP
error_reporting(-1);

// No mostrar los errores de PHP
error_reporting(0);

// Motrar todos los errores de PHP
error_reporting(E_ALL);

// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);
session_start();
if(isset($_SESSION['id'])){
    $uid=$_SESSION['id'];
    $usname=$_SESSION['username'];
    $result="Test variable: Username".$usname." ID:".$uid;
}else{
    $result="No has iniciado sesion";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $usname; ?> - Logeado</title>
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>           
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>             
    </head>
    <body>
           <?php echo $result;?>   
    </body>
</html>
