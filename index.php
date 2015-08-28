<?php
require("utilitarios/class.php");
session_start();
if (isset($_POST['submitButton'])) {
    if (isset($_POST['usuario']) and isset($_POST['password'])) {
        $existe = login($_POST['usuario'], $_POST['password']);
        if ($existe != 0 || $existe != null) {
            $nombre=  datos_usuario($existe);
            $_SESSION['id'] = $existe;
            $_SESSION['nombre']=$nombre;
            header("Location: /proyecto-git-php/proyecto-php/formulario.php");
        } else {
            $error = "Usuario no registrado";
        }
    }else{
        $error = "No ha ingresado datos";
    }
}

//print("<form id=\"loginForm\" method=\"post\" action=\"login.php\"> \n");
//print("Usuario: <input type=\"text\" name=\"usuario\" id=\"usuario\"><br /><br /> \n");
//print("Password: <input type=\"password\" name=\"password\" id=\"password\"><br /><br /> \n");
//print("<button type=\"submit\" name=\"submitButton\" id=\"submitButton\">Login</button>\n");
//print("</form>\n");
//prueba comentario
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Login</title>        
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>        
    </head>
    <body>
        <form id="loginForm" method="POST" action="index.php" enctype="multipart/form-data">
            Usuario: <input type="text" name="usuario" id="usuario"><br /><br />
                Password: <input type="password" name="password" id="password"><br /><br />
                    <button type="submit" name="submitButton" id="submitButton">Login</button>
                    </form> 
                    <div>
                        <p><?php echo $error; ?></p>
                    </div>
                    </body>
                    </html> 