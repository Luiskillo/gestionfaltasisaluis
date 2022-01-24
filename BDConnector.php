<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto faltas - BDConnector</title>
</head>

<body>

    <?php

    require 'Usuario.php';

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
    }

    ?>
</body>