<?php 

namespace ej2;

class ExamenFacil extends AExamen {

    const NOTA_MINIMA = 5;
    const NOTA_MAXIMA = 10;

	public function obtenerNota(): float|int {
        return random_int(static::NOTA_MINIMA, static::NOTA_MAXIMA);
	}
}

?>