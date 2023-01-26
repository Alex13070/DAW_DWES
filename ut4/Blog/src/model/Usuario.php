<?php

namespace ut4\Blog\src\model;

class Usuario {

    // id
    private string $correo;
    private string $clave;

    private string $nombre;

    private string $apellidos;

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
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


    public function __construct(string $correo, string $clave, string $nombre, string $apellidos) {
        $this->correo = $correo;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

}