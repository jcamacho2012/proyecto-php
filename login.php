<?php
require ("class.php");
if(isset($_POST['submitButton'])){
    if(!isset($_POST['usuario'])){
        die("Error..ingresar usuario");
    }else if(!isset ($_POST['password'])){
         die("Error..ingresar contraseña");
    }
    
    $tmp=  login($_POST['usuario'], $_POST['password']);
    if($tmp>0){
        echo ("usuario registrado");
        header("Location: ./formulario.php");
    }
    else{
        echo ("usuario no registrado");
    }
    
    
}

?>
