<?php 

namespace ej2;

class ExamenChungo extends AExamen {

    const NOTA_MINIMA = 0;
    const NOTA_MAXIMA = 7;

	public function obtenerNota(): float|int {
        return random_int(static::NOTA_MINIMA, static::NOTA_MAXIMA);
	}
}

?>