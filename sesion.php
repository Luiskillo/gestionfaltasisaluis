<?php

$usuarioCorrecto = true;

session_start();
//opcion
if (isset($_POST["option"])) {
    $opt = $_POST["option"];
    $_SESSION["opt"] = $opt;
}

//nombre profesor
if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $_SESSION["nombre"] = $nombre;
}

//para avanzar en el switch
if (isset($_POST["optContinuar"])) {
    $optContinuar = $_POST["optContinuar"];
    $_SESSION["optContinuar"] = $optContinuar;
}

//grupo de clase
if (isset($_POST["grupo"])) {
    $grupo = $_POST["grupo"];
    $_SESSION["grupo"] = $grupo;
}

//nombre del alumno
if (isset($_POST["alumno"])) {
    $alumno = $_POST["alumno"];
    $_SESSION["alumno"] = $alumno;
}

//motivo falta
if (isset($_POST["falta"])) {
    $falta = $_POST["falta"];
    $_SESSION["falta"] = $falta;
}

//motivo circustancia
if (isset($_POST["circustancia"])) {
    $circustancia = $_POST["circustancia"];
    $_SESSION["circustancia"] = $circustancia;
}

//motivo sancion
if (isset($_POST["sancion"])) {
    $sancion = $_POST["sancion"];
    $_SESSION["sancion"] = $sancion;
}

//observacion
if (isset($_POST["observacion"])) {
    $observacion = $_POST["observacion"];
    $_SESSION["observacion"] = $observacion;
}

if (isset($usuarioCorrecto)) {
    $_SESSION["usarioCorrecto"] = $usuarioCorrecto;
}

if (isset($_POST["historial"])) {
    $historial = $_POST["historial"];
    $_SESSION["historial"] = $historial;
}
//--------------------------------------------------------------------------------------------------------------------

if (isset($_POST["option"]) && $_POST["option"] == "inicio_sesion") {
    header("location: servidor.php");
}

if (isset($_POST["optContinuar"])) {
    if ($_POST["optContinuar"] == "default" || $_POST["optContinuar"] == "continuar" || $_POST["optContinuar"] == "continuar2" || $_POST["optContinuar"] == "continuar3") {
        header("location: registrarFalta.php");
    }
}
