<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\Placeholder;
use PlantillaFormulario\Utilidades\RegexPhp;

class CampoNumber extends CampoSimple {

    use Placeholder;

    private int $maximo;
    private int $minimo;

    public function __construct(string $label = "", string $name = "", string $placeholder = "", string $id = "", mixed $minimo = "", mixed $maximo = "", string $error = "") {
        parent::__construct($label, $name, InputType::NUMBER, $id, $error, RegexPhp::NUMERO);
        $this->minimo = $minimo;
        $this->maximo = $maximo;
        $this->placeholder = $placeholder;
    }

    public function contenidoCampo() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . 
                "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() .
                "' min='" . $this->minimo . "' max='" . $this->maximo . "' required>
        ";
    }

	public function validarCampo(array $peticion): bool {
        $return = false;
        if (isset($peticion[$this->getName()]) && preg_match($this->getPattern()->value, $peticion[$this->getName()])) {
            $numero = intval($peticion[$this->getName()]);
            if ($numero >= $this->minimo && $numero <= $this->maximo) {
                $return = true;
            }
        }
        
        return $return;
	}

	public function contenidoValidado(array $peticion): string {
        return "
        <label class='form-label'>". $this->getLabel() ."</label>
        <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . 
            "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() .
            "' min='" . $this->minimo . "' max='" . $this->maximo . "' value='" . $this->previousValue($peticion) . "' required>";
    }
}


?>