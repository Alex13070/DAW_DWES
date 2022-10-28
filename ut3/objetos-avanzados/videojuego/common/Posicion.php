<?php

namespace common;

class Posicion {

    private int $x;
    private int $y;
    private int $z;

    public function __construct(int $x = 0, int $y = 0, int $z = 0) {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function getX() {
        return $this->x;
    }

    public function setX($x) {
        $this->x = $x;
        return $this;
    }

    public function getY() {
        return $this->y;
    }

    public function setY($y) {
        $this->y = $y;
        return $this;
    }

    public function getZ(){
        return $this->z;
    }

    public function setZ($z) {
        $this->z = $z;
        return $this;
    }

    public function __toString(): string {
        return "(x: $this->x, y: $this->y, z: $this->z)";
    }

}