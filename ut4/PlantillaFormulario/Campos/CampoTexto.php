<?php 

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Utilidades\Error;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\Placeholder;

class CampoTexto extends Campo {
    
    use Placeholder;

    public function __construct(string $label = "", string $name = "", InputType $type = InputType::TEXT, string $placeholder = "", string $id = "", string $error) {
        parent::__construct($label, $name, $type, $id, $error);
        $this->placeholder = $placeholder;
        
    }

    public function getPlaceholder() : string {
        return $this->placeholder;
    }

    public function setPlaceholder(string $placeholder) : Campo{
        $this->placeholder = $placeholder;
        return $this;
    }

    public function contenidoCampo() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."'>
        ";
    }

    /**
     * Testea si la peticion sobre este campo sigue la regex
     * @param array Array con la peticion.
     */
    public function test(mixed $clave, mixed $texto) : bool {
        return is_null($this->getTest()) ? true : call_user_func($this->getTest(), $texto);
    }

    public function getFormNames(): array {
        return [$this->name];
    }
}

?>
