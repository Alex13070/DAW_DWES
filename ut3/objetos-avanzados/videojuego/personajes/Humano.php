<?php

// Vas a implementar un personaje Humano que escribirá "puñetazo" cuando ataque y "bloqueo" cuando defiende.

namespace personajes;

use common\Posicion;

class Humano extends Personaje {
    
    public function __construct(Posicion $posicion) {
        parent::__construct($posicion);
    }

    public function atacar(): void {
        echo "Puñetazo<br>";
    }
    
    public function defender(): void {
        echo "Bloqueo<br>";
    }
}