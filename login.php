<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="estilos.css" />
    <title>Instituto faltas - Login</title>
</head>

<body>
    <?php
    session_start();
    ?>
    <h1>BBDD Faltas Instituto - Inicio de sesión</h1>

    <form action="sesion.php" method="post">
        <input type="hidden" name="option" value="inicio_sesion" />

        <div class="recuadro">
            <input class="usuario" type="text" name="nombre" maxlength="50" placeholder="Usuario" />
        </div>
        <br />
        <input id="enviar" type="submit" />
    </form>

    <?php
    if (isset($_SESSION["usarioCorrecto"])) {
        if ($_SESSION["usarioCorrecto"] == false) {
    ?>
            <p>El nombre introducido no es correcto o el campo no ha sido rellenado</p>
    <?php
        }
    }
    ?>

</body>

</html>