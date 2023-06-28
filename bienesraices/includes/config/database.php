<?php

function conectarDB(){
    $db = mysqli_connect('localhost', 'root', '', 'bienes_raices_crud');

    if($db){
        echo "Se conectó";
    } else {
        echo "No se conectó";
    }
}