<?php

function conectarDB(){
    $db = mysqli_connect('localhost', 'admin', '4a064c3e49adda3cd93ab4e4196075207c4b1271dce85b73', 'bienes_raices');

    if($db){
        echo "Se conectó";
    } else {
        echo "No se conectó";
    }
}