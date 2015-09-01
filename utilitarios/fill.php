<?php

require ("listas.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['provincia'])) {
    echo lista_ciudad($_POST['provincia'],'default');
} else if (isset($_POST['ciudad'])) {
    echo lista_parroquia($_POST['ciudad']);
} else if (isset($_POST['q'])) {
    lista_usuarios($_POST['q']);
} else {
    echo'<option>no hay code</option>';
}


