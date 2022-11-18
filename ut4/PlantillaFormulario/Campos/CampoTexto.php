<?php 

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Utilidades\AtributoRegex;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\Placeholder;
use PlantillaFormulario\Utilidades\RegexPhp;

class CampoTexto extends CampoSimple {
    
    use Placeholder;
    use AtributoRegex;

    public function __construct(string $label, string $name, InputType $type, string $placeholder, string $id, string $error, RegexPhp $pattern) {
        parent::__construct($label, $name, $type, $id, $error);
        $this->pattern = $pattern;
        $this->placeholder = $placeholder;        
    }

    public function contenidoCampo(array $peticion) : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . 
                "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() .
                "' value='" . $this->previousValue($peticion) . "' pattern='" . substr($this->getPattern()->value, 1, -1) . "' required>
        ";
    }

	public function validarCampo(array $peticion): bool {
        return isset($peticion[$this->getName()]) && preg_match($this->getPattern()->value, $peticion[$this->getName()]);
	}

}

?>
