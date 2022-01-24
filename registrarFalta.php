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

    $arrayGrupos = $c->getGrupos();
    $sizeArrayGrupos = count($arrayGrupos);
    ?>

    <form action="sesion.php">
        <select name="destino">
            <option selected="selected" disabled="disabled" value="">Selecciona Grupo</option>
            <?php for ($i = 0; $i < $sizeArrayGrupos; $i++) { ?>
                <option value="<?php print_r($arrayGrupos[$i][0])  ?>"><?php print_r($arrayGrupos[$i][0]) ?></option>
            <?php } ?>
        </select>

    </form>

    <br><button><a href="login.html">Volver al inicio</a></button>

</body>

</html>