<?php

include 'listas.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['provincia'])) {
    echo lista_ciudad($_POST['provincia']);
} else if (isset($_POST['ciudad'])) {
    echo lista_parroquia($_POST['ciudad']);
} else {
    echo'<option>no hay code</option>';
}


