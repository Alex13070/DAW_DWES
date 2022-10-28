<?php 

namespace common;

trait Localizable {
    private Posicion $posicion;

    public function getPosicion() {
        return $this->posicion;
    }

    public function setPosicion($posicion) {
        $this->posicion = $posicion;
        return $this;
    }
}