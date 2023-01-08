<?php 

namespace ut4\Blog\src\objetos;

class Post {
    
    private string $usuario;
    private string $titulo;
    private string $cuerpo;
    private string $fecha;


    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
        return $this;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    public function getCuerpo() {
        return $this->cuerpo;
    }

    public function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
        return $this;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
        return $this;
    }

    public function __construct(string $usuario, string $titulo, string $cuerpo, string $fecha) {
        $this->usuario = $usuario;
        $this->titulo = $titulo;
        $this->cuerpo = $cuerpo;
        $this->fecha = $fecha;
    }
}