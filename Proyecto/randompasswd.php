<?php

function generarPass()
{
    $numero = 8;
    $abecedario = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWYZ";
    $pass = "";

    for ($i = 0; $i < $numero; $i++) {
        $caracterAleatorio = $abecedario[rand(0, strlen($abecedario) - 1)];
        $pass .= $caracterAleatorio;
    }
    echo "La Contraseña generada es :  $pass";

    //Meter pass en la base de datos
    //Esto se va a activar unicamente con el uso de un boton en el dashboard de administradores, ya tendremos una contraseña en la bd inicial

}


generarPass();
