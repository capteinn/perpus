<?php

function imprimir($string, $exit=0){
    echo "<pre>";
    print_r($string);
    echo "</pre>";
    
    if($exit == 1){
        exit;
    }
}

