<?php
//Santiago Calderon Castaño
//clase padre
require_once  "clasePersona.php";

//clase hija
class Estudiante extends Persona
{
    //Declaración de variable especifica para Estudiante
    private $numExpediente = "";

    // Definición del constructor
    public function __construct($dni, $nombre, $email, $numExpediente)
    {
        // Sobreescribimos el constructor de la clase padre (Persona)
        parent::__construct($dni, $nombre, $email);
        $this->numExpediente = $numExpediente; // Inicializamos el atributo específico de Estudiante
    }

    //Declaración de metodos get
    public function __getNumExpediente()
    {
        return $this->numExpediente;
    }
    //Declaración de metodos get, sobreescribiendo a los del padre
    public function __getDNI()
    {
        return parent::__getDNI();
    }
    public function __getNombre()
    {
        return parent::__getNombre();
    }
    public function __getEmail()
    {
        return parent::__getEmail();
    }

    //Declaración de metodos set
    public function __setNumExpediente($numExpediente)
    {
        return $this->numExpediente = $numExpediente;
    }
     //Declaración de metodos set, sobreescribiendo a los del padre
    public function __setDni($dni)
    {
        return parent::__setDni($dni);
    }
    public function __setNombre($nombre)
    {
        return parent::__setNombre($nombre);
    }
    public function __setEmail($email)
    {
        return parent::__setEmail($email);
    }

    // Método para mostrar información, sobreescribiendo el del padre
    public function Mostrar()
    {
        return parent::Mostrar() . "- Número de Expediente: " . $this->__getNumExpediente();
    }
}
