<?php
require ("class.php");

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
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<html>
	<head>
          
<link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/default.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
$(document).ready(function(){
setInterval(function(){
$("#tableID").load('tabla_ruta.php');
}, 1000);
});
</script>
<script>
		function abrir() {							
			window.open("/proyecto-git-php/proyecto-php/agregar_ruta.php","","width=500,height=300");		
                }
                
                 function editar(id){
                    window.open("/proyecto-git-php/proyecto-php/editar_ruta.php?id="+id,"","width=500,height=300");
                }
                
                 function eliminar(id){
                  window.open("/proyecto-git-php/proyecto-php/eliminar_ruta.php?id="+id,"","width=500,height=300");                            
                }
                
                function cargar(){
                     var table = document.getElementById ("viajes");
                    table.refresh ();
                }
                
                function fecha(){
                    document.getElementById('datePicker').value = new Date().toDateInputValue();
                }
</script>
	</head>
<body>
<nav>
    <?php echo menu(); ?>	
</nav> 
    <form action="" class="register">
            <h1>Solicitud de Autorizacion para Cumplimiento de Servicios Institucionales</h1>
            <fieldset class="row1">
                <legend>
                </legend>
                <p>
                    <label>Nº solicitud de autorizacion
                    </label>
                    <input type="text"/>   
                    <label>Fecha de solicitud
                    </label>
                    <input type="date" name="bday" value="<?php echo date('Y-m-d'); ?>" readonly=""/>
                </p>                
                <p>
                     <label>Viaticos 
                    </label>
                    <input type="checkbox" value="" />
                     <label>Movilizaciones 
                    </label>
                    <input type="checkbox" value="" />
                     <label>Subsistencias 
                    </label>
                    <input type="checkbox" value="" />
                     <label>Alimentacion 
                    </label>
                    <input type="checkbox" value="" />
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Datos Generales
                </legend>
                <p>
                    <label>Nombre Completo
                    </label>
                    <input type="text" class="long" value="NN NN"  readonly=""/>
                </p>
                <p>
                    <label>Cedula
                    </label>
                    <input type="text" maxlength="10" value="0927619858" readonly=""/>
                </p>
                <p>
                    <label>Puesto
                    </label>
                    <input type="text" class="long" value="Servidor Publico 3" readonly=""/>
                </p>
                <p>
                    <label>City *
                    </label>
                    <input type="text" class="long"/>
                </p>
                <p>
                    <label>Country *
                    </label>
                    <select>
                        <option>
                        </option>
                        <option value="1">United States
                        </option>
                    </select>
                </p>
                <p>
                    <label class="optional">Website
                    </label>
                    <input class="long" type="text" value="http://"/>

                </p>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
                <p>
                    <label>Gender *</label>
                    <input type="radio" value="radio"/>
                    <label class="gender">Male</label>
                    <input type="radio" value="radio"/>
                    <label class="gender">Female</label>
                </p>
                <p>
                    <label>Birthdate *
                    </label>
                    <select class="date">
                        <option value="1">01
                        </option>
                        <option value="2">02
                        </option>
                        <option value="3">03
                        </option>
                        <option value="4">04
                        </option>
                        <option value="5">05
                        </option>
                        <option value="6">06
                        </option>
                        <option value="7">07
                        </option>
                        <option value="8">08
                        </option>
                        <option value="9">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <select>
                        <option value="1">January
                        </option>
                        <option value="2">February
                        </option>
                        <option value="3">March
                        </option>
                        <option value="4">April
                        </option>
                        <option value="5">May
                        </option>
                        <option value="6">June
                        </option>
                        <option value="7">July
                        </option>
                        <option value="8">August
                        </option>
                        <option value="9">September
                        </option>
                        <option value="10">October
                        </option>
                        <option value="11">November
                        </option>
                        <option value="12">December
                        </option>
                    </select>
                    <input class="year" type="text" size="4" maxlength="4"/>e.g 1976
                </p>
                <p>
                    <label>Nationality *
                    </label>
                    <select>
                        <option value="0">
                        </option>
                        <option value="1">United States
                        </option>
                    </select>
                </p>
                <p>
                    <label>Children *
                    </label>
                    <input type="checkbox" value="" />
                </p>
                <div class="infobox"><h4>Helpful Information</h4>
                    <p>Here comes some explaining text, sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I want to receive personalized offers by your site</label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>Allow partners to send me personalized offers and related services</label>
                </p>
            </fieldset>
            <div><button class="button">Register &raquo;</button></div>
        </form>
    <div class="grupo">
        <h1>Ingreso de datos tabla</h1>
<!--        Salida: <input type="text" name="salida" id="salida" /><br />
        Llegada: <input type="text" name="llegada" id="llegada" /><br />-->
        <button type="submit" name="submitButton" id="submitButton" onclick="abrir()" >Agregar Ruta</button>
        <br />
        <br />
        
        <div id="tableID">
             <?php include_once'tabla_ruta.php'; ?>
            
        </div>        
    </div>
    
</body>
</html>
