<?php 

namespace ej2;

trait TieneFecha {

    private string $fecha;

    public function getFecha() : string {
        return $this->fecha;
    }

    public function setFecha(string $fecha) {
        $this->fecha = $fecha;
    }
}

?>