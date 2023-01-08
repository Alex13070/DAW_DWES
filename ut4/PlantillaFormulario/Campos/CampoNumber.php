<?php

namespace ut4\PlantillaFormulario\Campos;

use ut4\PlantillaFormulario\Utilidades\AtributoRegex;
use ut4\PlantillaFormulario\Utilidades\InputType;
use ut4\PlantillaFormulario\Utilidades\Placeholder;
use ut4\PlantillaFormulario\Utilidades\RegexPhp;

class CampoNumber extends CampoSimple {

    use Placeholder;

    private int|null $maximo;
    private int|null $minimo;

    public function __construct(string $label, string $name, string $placeholder, string $id, int|null $minimo, int|null $maximo, string $error = "") {
        parent::__construct($label, $name, InputType::NUMBER, $id, $error, RegexPhp::NUMERO);
        $this->minimo = $minimo;
        $this->maximo = $maximo;
        $this->placeholder = $placeholder;
    }

	public function validarCampo(array $peticion): bool {
        $return = false;
        if (isset($peticion[$this->getName()]) && preg_match($this->getPattern()->value, $peticion[$this->getName()])) {
            $numero = intval($peticion[$this->getName()]);
            $return = (is_null($this->minimo) || $numero >= $this->minimo) && (is_null($this->maximo) || $numero <= $this->maximo);
        }
        
        return $return;
	}

	public function contenidoCampo(array $peticion): string {
        return "
        <label class='form-label'>". $this->getLabel() ."</label>
        <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . 
            "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() . "'" . 
            ((!is_null($this->maximo)) ? " min='" . $this->minimo . "'" : "") .  
            ((!is_null($this->maximo)) ? " max='" . $this->maximo . "'" : "" ) . " value='" . $this->previousValue($peticion) . "' required>";
    }
}


?>