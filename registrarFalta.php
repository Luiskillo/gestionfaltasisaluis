<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Falta</title>
</head>

<body>

    <?php
    session_start();

    require 'BDConnector.php';
    require 'funciones.php';

    $opt = $_SESSION["opt"];
    $op_user = $_SESSION["opt_user"];
    $name = $_SESSION["name"];

    $c = new ConectorBD();


    ?>

    <form action="">

    </form>

</body>

</html>