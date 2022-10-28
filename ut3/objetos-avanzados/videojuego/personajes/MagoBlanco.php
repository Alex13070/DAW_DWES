<?php 

namespace personajes;

use common\Posicion;

class MagoBlanco extends Mago {

    public function __construct(Posicion $posicion) {
        parent::__construct($posicion);
    }


    public function atacar(): void {
        echo "Ataque luz<br>";
    }
}

?>