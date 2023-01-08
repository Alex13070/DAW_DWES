<?php 

namespace ej2;

class ExamenHP extends AExamen {

    const NOTA_MINIMA = 4;
    const NOTA_MAXIMA = 4.5;

	public function obtenerNota(): float|int {
        return random_int(static::NOTA_MINIMA * 100, static::NOTA_MAXIMA * 100) / 100;
	}
}

?>