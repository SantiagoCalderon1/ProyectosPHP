<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 04-01</title>
</head>

<body>
    <h1>Ejercicio 04-01</h1>
    <?php
    class Persona
    {
        private $dni = "";
        private $nombre = "";
        private $email = "";

        public function __construct($dni,  $nombre, $email)
        {
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->email = $email;
        }

        public function __getDNI()
        {
            return $this->dni;
        }
        public function __getNombre()
        {
            return $this->nombre;
        }
        public function __getEmail()
        {
            return $this->email;
        }

        public function __setDni($dni)
        {
            return $this->dni =  $dni;
        }
        public function __setNombre($nombre)
        {
            return $this->nombre = $nombre;
        }
        public function __setEmail($email)
        {
            return $$this->email = $email;
        }

        //get_class($this) así se obtiene el nombre de la clase

        public function Mostrar(){
            echo "Nombre: ". __getNombre()."";
        }
    }
    ?>

</body>

</html>