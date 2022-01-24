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
        $this->user = "root"; //CUIDADO
        $this->pass = "pass"; //CUIDADO
    }

    public function conectarUsuario($nombre)
    {
        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select * from usuario where pk_name_prof = '$nombre'";
        $resultado = mysqli_query($conector, $sql);

        if ($nombre == '') {
            echo "ERROR » DEBE INTRODUCIRSE UN NOMBRE DE USUARIO<br>";
        } else if ($resultado->num_rows == 1) {

            echo "USUARIO CONECTADO<br>";
            //entrar a la bbdd de las faltas

        } else {
            echo "EL USUARIO « $nombre » NO EXISTE<br>";
        }
        mysqli_close($conector);
    }

    public function getRol($nombre)
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select rol from usuario where pk_name_prof = '$nombre'";
        $resultado = mysqli_query($conector, $sql);

        $arrayUsers = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($arrayUsers, $fila);
        }

        return $arrayUsers;
        mysqli_close($conector);
    }

    public function getGrupos()
    {

        $conector = mysqli_connect($this->servername, $this->user, $this->pass, $this->database);
        $sql = "select DISTINCT grupo from alumno";
        $resultado = mysqli_query($conector, $sql);

        $arrayGrupos = [];

        for ($i = 1; $i <= $resultado->num_rows; $i++) {
            $fila = $resultado->fetch_row();
            array_push($arrayGrupos, $fila);
        }

        return $arrayGrupos;
        mysqli_close($conector);
    }
}
