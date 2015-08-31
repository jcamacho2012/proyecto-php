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
//if (isset($_POST['username'])) {
//    $dbname = "jose";
//    $dbpassword = "jose";
//    $uid = "1";
//
//    $usname = ($_POST["username"]);
//    $paswd = ($_POST["password"]);
//    
//
//    if ($usname == $dbname && $paswd == $dbpassword) {
//        $_SESSION['username'] = $usname;
//        $_SESSION['id'] = $uid;
//        header("Location:llenar.php");
//    } else {
//        echo "<h1>Error</h1>";
//    }
//}
?>
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/jquery-ui.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>           
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>             
    </head>
    <body>
        <form id="form" action="prueba.php" method="POST" enctype="multipart/form-data">
            Username:<input type="text" name="username"/><br /><br />
            Password:<input type="password" name="password"/><br />
            <input type="submit" value="Login" name="login"/>
        </form>  
        <?php

        function someFunc() {
            $aVariable = 15;
            $aVariable2 = 20;

            return array($aVariable, $aVariable2);
        }

        list($var1, $var2) = someFunc();

//will print out values from someFunc
        echo $var1+"<br />";
        echo $var2;
        ?>
    </body>
</html>
