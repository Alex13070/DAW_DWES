<?php 

// También vas a implemetnar un persnaje Mago. Todos los magos se dienden diciendo "hechizo protector" pero hay dos tipos de magos. 
// Los personajes MagosBlancos que atacan escribiendo "ataque de luz", y los MagosOscuros que atacan escribiendo "ataque de sombra"
// (Mago es una clase abstracta)

namespace personajes;

use common\Posicion;

abstract class Mago extends Personaje {

    public abstract function atacar(): void;

    public function defender(): void {
        echo "Hechizo protector<br>";
    }

    public function __construct(Posicion $posicion) {
        parent::__construct($posicion);
    }

}