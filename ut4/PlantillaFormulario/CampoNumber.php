<?php

namespace PlantillaFormulario;

class CampoNumber extends Campo {

    private int $maximo;
    private int $minimo;


    public function __construct(string $label = "", string $name = "", string $placeholder = "", string $id = "", mixed $minimo = "", mixed $maximo = "", Error $error) {
        parent::__construct($label, $name, InputType::NUMBER, $placeholder, $id, $error);
        $this->minimo = $minimo;
        $this->maximo = $maximo;
    }

    public function contenidoCampo() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."' min='" . $this->minimo . "' max='" . $this->maximo . "'>
        ";
    }
}


?>