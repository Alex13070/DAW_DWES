<?php

namespace PlantillaFormulario\Utilidades;

class Error {
    private string $mensaje;
    private bool $activado;

    public function __construct(string $mensaje, bool $activado = false) {
        $this->mensaje = $mensaje;
        $this->activado = $activado;
    }

    public function getMensaje() : string {
        return $this->mensaje;
    }

    public function setMensaje(string $mensaje) : Error {
        $this->mensaje = $mensaje;
        return $this;
    }

    public function isActivado() : bool {
        return $this->activado;
    }

    public function setActivado($activado) : Error {
        $this->activado = $activado;
        return $this;
    }
}

?>