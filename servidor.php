<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instituto faltas - Servidor</title>
    <link rel="stylesheet" href="estilos.css">
    
</head>

<body>

<?php

require 'BDConnector.php';

//Actu Isabel
//actu luis

    $option = $_POST['option'];
    //Hay que ver como sacar el rol de profesor/director

    $conector = new ConectorBD();

    switch ($option) {
        case "inicio_sesion":
            $nombre = $_POST['nombre'];

            $conector->conectarUsuario($nombre);
            break;
    }
?>

<br><button><a href="login.html">Volver al inicio</a></button>
</body>