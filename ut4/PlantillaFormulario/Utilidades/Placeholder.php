<?php

namespace ut4\PlantillaFormulario\Utilidades;

use ut4\PlantillaFormulario\Campos\Campo;

trait Placeholder {

    private string $placeholder;

    public function getPlaceholder() : string {
        return $this->placeholder;
    }
 
    public function setPlaceholder(string $placeholder) : mixed {
        $this->placeholder = $placeholder;
        return $this;
    }
}