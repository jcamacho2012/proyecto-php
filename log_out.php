<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
session_destroy();
if(isset($_SESSION['username'])){
    $msg="Has cerrado sesion";   
}else{
    $msg="no puedes cerrar sesion";
}
?>
<html>
    <body>
        <?php echo $msg?><br>
        <p><a href="/proyecto-git-php/proyecto-php/prueba.php">Click aqui</a> para retorna a pagina principal</p>
    </body>
</html>


