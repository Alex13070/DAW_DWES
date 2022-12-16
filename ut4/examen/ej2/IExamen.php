<?php 

namespace ej2;

interface IExamen {
    public function intentar(string $cadena) : void;
    public function obtenerNota() : int|float;
}

?>