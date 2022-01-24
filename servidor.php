<?php

session_start();

require 'BDConnector.php';
require 'funciones.php';

$opt = $_SESSION["opt"];
$nombre = $_SESSION["nombre"];

$c = new ConectorBD();

//Hay que ver como sacar el rol de profesor/director --- Hecho ---

$arrayRol = $c->getRol($nombre);
$arrayNombreProf = $c->getNameProf($nombre);

switch ($opt) {
    case "inicio_sesion":

        if ($nombre != null && $arrayRol[0][0] != null) {
            if ($arrayRol[0][0] == "Director") {
                $_SESSION["opt_user"] = "dir";
                $_SESSION["nombre"] = $arrayNombreProf[0][0];
                $_SESSION["usarioCorrecto"] = true;

                $url = "registrarFalta.php";
                redirect($url);
            } else {
                $_SESSION["opt_user"] = "prof";
                $_SESSION["nombre"] = $arrayNombreProf[0][0];
                $_SESSION["usarioCorrecto"] = true;

                $url = "registrarFalta.php";
                redirect($url);
            }
        } else {
            $_SESSION["usarioCorrecto"] = false;
            $url = "login.php";
            redirect($url);
        }

        break;
}
