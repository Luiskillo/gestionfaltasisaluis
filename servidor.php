<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Instituto faltas - Servidor</title>
    <link rel="stylesheet" href="estilos.css">

</head>

<body>

    <?php

    session_start();

    require 'BDConnector.php';
    require 'funciones.php';

    $opt = $_SESSION["opt"];
    $name = $_SESSION["name"];

    $c = new ConectorBD();

    //Hay que ver como sacar el rol de profesor/director
    $arrayRol = $c->getRol($name);
    $sizeArrayRol = count($arrayRol);

    switch ($opt) {
        case "inicio_sesion":

            if ($name != null && $arrayRol[0][0] != null) {
                if ($arrayRol[0][0] == "Director") {
                    echo "dire";
                } else {
                    echo "prof";
                }
            } else {
                $url = "login.html";
                redirect($url);
            }

            break;
    }
    ?> <br><button><a href="login.html">Volver al inicio</a></button>
</body>