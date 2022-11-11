<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Utilidades\Error;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\Placeholder;

class CampoNumber extends CampoTexto {

    private int $maximo;
    private int $minimo;

    public function __construct(string $label = "", string $name = "", string $placeholder = "", string $id = "", mixed $minimo = "", mixed $maximo = "", string $error) {
        parent::__construct($label, $name, InputType::NUMBER, $id, $placeholder, $error);
        $this->minimo = $minimo;
        $this->maximo = $maximo;
        $this->placeholder = $placeholder;
    }

    public function contenidoCampo() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."' min='" . $this->minimo . "' max='" . $this->maximo . "'>
        ";
    }
}


?>