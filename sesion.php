<?php
$opt = $_POST["option"];
$name = $_POST["nombre"];

session_start();

$_SESSION["opt"] = $opt;
$_SESSION["name"] = $name;

header("location: servidor.php");
