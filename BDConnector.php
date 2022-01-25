<?php

class ConectorBD
{

    private $servername;
    private $database;
    private $user;
    private $pass;


    function __construct()
    {
        $this->servername = "localhost";
        $this->database = "gestionfaltasisaluis";
        $this->user = "user"; //CUIDADO
        $this->pass = "pass"; //CUIDADO
    }

    public function getRol($nombre)
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select rol from usuario where pk_name_prof = '$nombre'";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getNameProf($nombre)
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select pk_name_prof from usuario where pk_name_prof = '$nombre'";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getGrupos()
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select DISTINCT grupo from alumno";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getAlumnos($grupo)
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select pk_name_alumno from alumno where grupo = '$grupo'";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getFaltasProf()
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select pk_motivo_falta from falta where fk_cod_gravedad = 'L' or fk_cod_gravedad = 'G'";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getFaltasDir()
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select pk_motivo_falta from falta where fk_cod_gravedad = 'G' or fk_cod_gravedad = 'MG'";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getCircustancia()
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select pk_motivo_circustancia from circustancia";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getSancionProf()
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select pk_motivo_sancion from sancion where fk_cod_gravedad = 'L' or fk_cod_gravedad = 'G'";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getSancionDir()
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select pk_motivo_sancion from sancion where fk_cod_gravedad = 'G' or fk_cod_gravedad = 'MG'";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getCodGravedad($falta)
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select fk_cod_gravedad from falta where pk_motivo_falta = '$falta'";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function getId()
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select pk_id_falta from historial";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }

    public function insertarFalta($id, $alumno, $nombre, $codGravedad, $falta, $sancion, $circustancia, $fecha, $observacion)
    {
        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "insert into historial (pk_id_falta, fk_name_alumno, fk_name_prof, fk_cod_gravedad, fk_motivo_falta, fk_motivo_sancion, fk_motivo_circustancia, fecha, observacion) values ('$id', '$alumno', '$nombre', '$codGravedad', '$falta', '$sancion',  '$circustancia', '$fecha', '$observacion');";

        if (mysqli_query($conector, $sql)) {
            return true;
        } else {
            return false;
        }
        mysqli_close($conector);
    }

    public function getHistorial()
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select * from historial";
        $resultado = mysqli_query($conector, $sql);

        $array = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($array, $fila);
        }

        return $array;
        mysqli_close($conector);
    }
}
