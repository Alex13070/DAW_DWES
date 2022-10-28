<?php 

namespace objetos;

use common\Descriptible;
use common\Localizable;
use common\Posicion;

abstract class Objeto {
    use Descriptible;
    use Localizable;

    private int $peso;

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
        return $this;
    }

    public function __construct(Posicion $posicion, string $descripcion, int $peso) {
        $this->posicion = $posicion;
        $this->descripcion = $descripcion;
        $this->peso = $peso;
    }

    public function __toString(): string {
        return static::class." ( Posicion: ". $this->getPosicion()->__toString() . ", descripcion: $this->descripcion, peso: $this->peso )";        
    }

    public function pintarDatos() {
        echo $this->__toString();
    }
}