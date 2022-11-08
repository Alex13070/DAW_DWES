<?php

namespace PlantillaFormulario\Utilidades;

use PlantillaFormulario\Campos\Campo;

trait Placeholder {

    private string $placeholder;

    public function getPlaceholder() : string {
        return $this->placeholder;
    }
 
    public function setPlaceholder(string $placeholder) : Campo {
        $this->placeholder = $placeholder;
        return $this;
    }
}