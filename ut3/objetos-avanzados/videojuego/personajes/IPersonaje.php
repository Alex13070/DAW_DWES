<?php

// En el futuro esperas que otros jugadores-programadores creen muchos tipos de personajes, 
// así que decides crear un Intefaz personaje con los métosdos atacar y defender.

namespace personajes;

interface IPersonaje {
    public function atacar(): void;
    public function defender(): void;
    public function pintarDatos(): void;
}

?>