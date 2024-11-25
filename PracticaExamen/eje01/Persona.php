<?php
abstract class Persona
{
    public function __construct(
        protected string $nombre = '',
        protected int $edad = 0,
        protected string $email = '',
    ) {}

    public function getNombre() : string{
        return $this->nombre;
    }

    public function getEdad() : int {
        return $this->edad;
    }

    public function getEmail() : string {
        return $this->email;
    }
}
