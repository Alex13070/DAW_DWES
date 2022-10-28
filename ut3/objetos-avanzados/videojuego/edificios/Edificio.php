<?php 

namespace edificios;

use common\Descriptible;
use common\Localizable;
use common\Posicion;

abstract class Edificio {

    use Localizable;
    use Descriptible;

    private int $altura;

    public function getAltura() {
        return $this->altura;
    }
 
    public function setAltura($altura) {
        $this->altura = $altura;
        return $this;
    }

    public function __construct(Posicion $posicion, string $descripcion, int $altura) {
        $this->posicion = $posicion;
        $this->descripcion = $descripcion;
        $this->altura = $altura;
    }

    public function __toString(): string {
        return static::class." ( Posicion: ". $this->getPosicion()->__toString() . ", descripcion: $this->descripcion, peso: $this->altura )";        
    }

    public function pintarDatos() {
        echo $this->__toString();
    }


}