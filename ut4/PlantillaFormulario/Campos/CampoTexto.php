<?php 

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\Placeholder;
use PlantillaFormulario\Utilidades\RegexPhp;

class CampoTexto extends CampoSimple {
    
    use Placeholder;

    public function __construct(string $label = "", string $name = "", InputType $type = InputType::TEXT, string $placeholder = "", string $id = "", string $error, RegexPhp $pattern) {
        parent::__construct($label, $name, $type, $id, $error, $pattern);
        $this->placeholder = $placeholder;        
    }

    public function contenidoCampo() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . 
                "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."' required>
        ";
    }

    public function contenidoValidado(array $peticion) : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . 
                "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() .
                "' value='" . $this->previousValue($peticion) . "' required>
        ";
    }

	public function validarCampo(array $peticion): bool {
        return isset($peticion[$this->getName()]) && preg_match($this->getPattern()->value, $peticion[$this->getName()]);
	}

}

?>
