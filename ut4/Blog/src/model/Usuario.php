<?php

namespace ut4\Blog\src\objetos;

class Usuario {

    private string $nombreUsuario;
    private string $clave;

    private string $nombre;

    private string $apellidos;

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
        return $this;
    }

    public function getClave()
    {
        return $this->clave;
    }
 
    public function setClave($clave) {
        $this->clave = $clave;
        return $this;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
        return $this;
    }


    public function __construct(string $nombreUsuario, string $clave, string $nombre, string $apellidos) {
        $this->nombreUsuario = $nombreUsuario;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

}