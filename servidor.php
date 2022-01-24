<?php

session_start();

require 'BDConnector.php';
require 'funciones.php';

$opt = $_SESSION["opt"];
$name = $_SESSION["name"];

$c = new ConectorBD();

//Hay que ver como sacar el rol de profesor/director --- Hecho ---
$arrayRol = $c->getRol($name);
$sizeArrayRol = count($arrayRol);

switch ($opt) {
    case "inicio_sesion":

        if ($name != null && $arrayRol[0][0] != null) {
            if ($arrayRol[0][0] == "Director") {
                $_SESSION["opt_user"] = "dir";

                $url = "registrarFalta.php";
                redirect($url);
            } else {
                $_SESSION["opt_user"] = "prof";

                $url = "registrarFalta.php";
                redirect($url);
            }
        } else {
            $url = "login.html";
            redirect($url);
        }

        break;
}
?> <br><button><a href="login.html">Volver al inicio</a></button>
</body>