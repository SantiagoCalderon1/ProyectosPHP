<?php
//Santiago Calderon Castaño
//Clase padre
    class Persona
    {
        //Declaración de variables
        private $dni = "";
        private $nombre = "";
        private $email = "";

            // Definición del constructor
        public function __construct($dni,  $nombre, $email)
        {
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->email = $email;
        }

        //Declaración de metodos get
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

        //Declaración de metodos get
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
            return $this->email = $email;
        }

        //get_class($this) así se obtiene el nombre de la clase

        // Método para mostrar información
        public function Mostrar()
        {
            echo "Nombre: " . $this->__getNombre() . " - DNI: " . $this->__getDNI() . " - Email: " . $this->__getEmail();
        }
    }
    ?>