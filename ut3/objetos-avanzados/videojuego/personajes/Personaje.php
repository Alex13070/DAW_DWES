<?php 

namespace personajes;

use common\Localizable;
use common\Posicion;

abstract class Personaje implements IPersonaje {
    
    use Localizable;

    public function __construct(Posicion $posicion) {
        $this->posicion = $posicion;
    }

    public function __toString(): string {
        return static::class." ( Posicion: ". $this->getPosicion()->__toString() . " )";        
    }

    public function pintarDatos (): void {
        echo static::__toString();
    }

    
}

?>