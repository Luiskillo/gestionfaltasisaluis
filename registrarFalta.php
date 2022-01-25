<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" />
    <title>Registrar Falta</title>
</head>

<body>

    <?php
    session_start();

    require 'BDConnector.php';
    require 'funciones.php';

    $c = new ConectorBD();

    $opt = $_SESSION["opt"];
    $opt_user = $_SESSION["opt_user"];
    $nombre = $_SESSION["nombre"];

    if (isset($_SESSION["optContinuar"])) {
        $optContinuar = $_SESSION["optContinuar"];
    } else {
        $optContinuar = "default";
    }

    if (isset($_SESSION["historial"])) {
        $historial = $_SESSION["historial"];
    }

    if (isset($_SESSION["grupo"])) {
        $grupo = $_SESSION["grupo"];
        $arrayAlumnos = $c->getAlumnos($grupo);
        $sizeArrayAlumnos = count($arrayAlumnos);
    }

    if (isset($_SESSION["alumno"])) {
        $alumno = $_SESSION["alumno"];
    }

    if (isset($_SESSION["falta"])) {
        $falta = $_SESSION["falta"];
    }

    if (isset($_SESSION["circustancia"])) {
        $circustancia = $_SESSION["circustancia"];
    }

    if (isset($_SESSION["sancion"])) {
        $sancion = $_SESSION["sancion"];
    }

    if (isset($_SESSION["observacion"])) {
        $observacion = $_SESSION["observacion"];
    }

    $arrayGrupos = $c->getGrupos();
    $sizeArrayGrupos = count($arrayGrupos);

    $arrayFaltasProf = $c->getFaltasProf();
    $sizeArrayProf = count($arrayFaltasProf);

    $arrayFaltasDir = $c->getFaltasDir();
    $sizeArrayDir = count($arrayFaltasDir);

    $arrayCircustancia = $c->getCircustancia();
    $sizeArrayCircustancia = count($arrayCircustancia);

    $arraySancionProf = $c->getSancionProf();
    $sizeArraySancionProf = count($arraySancionProf);

    $arraySancionsDir = $c->getSancionDir();
    $sizeArraySancionDir = count($arraySancionsDir);

    $arrayHistorial = $c->getHistorial();
    $sizeArrayHistorial = $c->getHistorial();

    ?>

    <h2>Hola <?php echo $nombre ?></h2>

    <form action="sesion.php" method="post">

        <?php

        switch ($optContinuar) {
            case "default": ?>
                <input type="hidden" name="optContinuar" value="continuar">
                <select name="grupo">
                    <option selected="selected" disabled="disabled" value="">Selecciona Grupo</option>
                    <?php for ($i = 0; $i < $sizeArrayGrupos; $i++) { ?>
                        <option value="<?php print_r($arrayGrupos[$i][0])  ?>"><?php print_r($arrayGrupos[$i][0]) ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Continuar">
            <?php
                break;
            case "continuar": ?>
                <input type="hidden" name="optContinuar" value="continuar2">
                <select name="alumno">
                    <option selected="selected" disabled="disabled" value="">Selecciona Alumno</option>
                    <?php for ($i = 0; $i < $sizeArrayAlumnos; $i++) { ?>
                        <option value="<?php print_r($arrayAlumnos[$i][0])  ?>"><?php print_r($arrayAlumnos[$i][0]) ?></option>
                    <?php } ?>
                </select>

                <select name="falta">
                    <option selected="selected" disabled="disabled" value="">Selecciona Falta</option>
                    <?php
                    if ($opt_user == "dir") {
                        for ($i = 0; $i < $sizeArrayDir; $i++) { ?>
                            <option value="<?php print_r($arrayFaltasDir[$i][0]) ?>"><?php print_r($arrayFaltasDir[$i][0]) ?></option>
                        <?php
                        }
                    } else {
                        for ($i = 0; $i < $sizeArrayProf; $i++) { ?>
                            <option value="<?php print_r($arrayFaltasProf[$i][0]) ?>"><?php print_r($arrayFaltasProf[$i][0]) ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <select name="circustancia">
                    <option selected="selected" disabled="disabled" value="">Selecciona Circustancia</option>
                    <?php for ($i = 0; $i < $sizeArrayCircustancia; $i++) { ?>
                        <option value="<?php print_r($arrayCircustancia[$i][0])  ?>"><?php print_r($arrayCircustancia[$i][0]) ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Continuar">
            <?php
                break;
            case "continuar2": ?>
                <input type="hidden" name="optContinuar" value="continuar3">

                <select name="sancion">
                    <option selected="selected" disabled="disabled" value="">Selecciona Sancion</option>
                    <?php
                    if ($opt_user == "dir") {
                        for ($i = 0; $i < $sizeArraySancionDir; $i++) { ?>
                            <option value="<?php print_r($arraySancionsDir[$i][0]) ?>"><?php print_r($arraySancionsDir[$i][0]) ?></option>
                        <?php
                        }
                    } else {
                        for ($i = 0; $i < $sizeArraySancionProf; $i++) { ?>
                            <option value="<?php print_r($arraySancionProf[$i][0]) ?>"><?php print_r($arraySancionProf[$i][0]) ?></option>
                    <?php
                        }
                    }
                    ?>
                </select> <br>
                <textarea name="observacion" maxlength="240"></textarea><br>

                <input type="submit" value="Finalizar">

            <?php
                break;
            case "continuar3":

                $arrayCodGravedad = $c->getCodGravedad($falta);
                $codGravedad = $arrayCodGravedad[0][0];
                $arrayId = $c->getId();
                if (empty($arrayId)) {
                    $agregarIdExtra = 1;
                } else {
                    $sizeArrayId = count($arrayId);
                    $valorUltimaId = $arrayId[$sizeArrayId - 1][0];
                    $agregarIdExtra =  array_push($arrayId, $valorUltimaId + 1);
                }

                $fecha = date("Y/m/d");

                $insertarFalta = $c->insertarFalta($agregarIdExtra, $alumno, $nombre, $codGravedad, $falta, $sancion, $circustancia, $fecha, $observacion);
            ?>
                <input type="hidden" name="optContinuar" value="continuar3">

                <?php
                if ($insertarFalta) {
                    echo "falta agregada correctamente";
                } else {
                    echo "error";
                }
                ?>
        <?php
        }
        ?>


    </form>

    <form action="sesion.php" method="post">
        <input type="hidden" name="optContinuar" value="default">
        <input type="hidden" name="historial" value="historial">
        <input type="submit" value="Ver Historial">
    </form>
    <?php
    if (isset($historial)) {
        if ($historial == "historial") {
    ?>
            
            <table id="tablaFaltas">
                <tr>
                    <th>Id</th>
                    <th>Alumno</th>
                    <th>Profesor</th>
                    <th>Cod_gravedad</th>
                    <th>Falta</th>
                    <th>Sancion</th>
                    <th>Circustancia</th>
                    <th>Fecha</th>
                    <th>observacion</th>
                </tr>
                <?php
                for ($i = 0; $i < count($arrayHistorial); $i++) {
                ?>
                    <tr><?php
                        for ($j = 0; $j < count($arrayHistorial[$i]); $j++) {

                        ?>
                            <td><?php echo $arrayHistorial[$i][$j] ?></td>
                        <?php
                        } ?>
                    </tr>
                <?php
                }
                ?>
            </table>
            </div>
    <?php
        }
    } ?>




    <br><button><a href="login.php">Volver al inicio</a></button>

</body>

</html>