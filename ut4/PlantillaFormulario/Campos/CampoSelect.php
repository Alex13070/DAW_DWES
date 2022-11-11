<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Opciones\OpcionSelect;
use PlantillaFormulario\Utilidades\Error;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\Placeholder;

class CampoSelect extends CampoMultiple {

    use Placeholder;

    public function __construct(string $label = "", string $name = "", string $placeholder = "", string $id ="", string $error) {
        parent::__construct($label, $name, InputType::SELECT, $id, $error);
        $this->placeholder = $placeholder;
    }

    public function contenidoCampo() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <select class='form-select' aria-label='Default select example' name='". $this->getName() ."' id='" . $this->getId() . "'>
                <option selected style='display: none'>". $this->getPlaceHolder() ."</option>
                "
                    . array_reduce($this->getOpciones(), function(string $acumulador, OpcionSelect $opcion) {
                        return $acumulador.$opcion->pintarOpcion();
                    }, "") .
                "
            </select> 
        ";
    }    

    public function crearSelect(string $label, string $value) {
        $this->crearOpcion([
            "label" => $label,
            "value" => $value
        ]);
    }

	protected function crearOpcion(array $args) : void {
        $opcion = new OpcionSelect($args["label"], $args["value"]);
        $this->addOpcion($opcion);
	}
	/**
	 *
	 * @param mixed $clave
	 * @param mixed $valor
	 *
	 * @return bool
	 */
	function test(mixed $clave, mixed $valor): bool {
        return true;
	}

    public function getFormNames() : array {
        return [$this->getName()];
    }
}


?>