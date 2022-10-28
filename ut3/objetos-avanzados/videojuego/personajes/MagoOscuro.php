<?php 

namespace personajes;

use common\Posicion;

class MagoOscuro extends Mago {

    public function __construct(Posicion $posicion) {
        parent::__construct($posicion);
    }
    
    public function atacar(): void {
        echo "Ataque sombra<br>";
    }
}

?>