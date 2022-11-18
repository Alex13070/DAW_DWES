<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Opciones\Opcion;
use PlantillaFormulario\Opciones\OpcionSelect;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\Placeholder;

class CampoSelect extends CampoMultiple {

    use Placeholder;

    public function __construct(string $label = "", string $name = "", string $placeholder = "", string $id ="", string $error = "") {
        parent::__construct($label, $name, InputType::SELECT, $id, $error);
        $this->placeholder = $placeholder;
    }

    public function crearCampo(array $peticion): string {
        return "
        <div class='mb-3'>
            <label class='form-label'>". $this->getLabel() ."</label>
            <select class='form-select' aria-label='Default select example' name='". $this->getName() ."' id='" . $this->getId() . "' required>
                " . $this->contenidoCampo($peticion) . "
            </select> 
        </div>
        ";
	}

    public function contenidoCampo(array $peticion): string {

        $previousValue = (isset($peticion[$this->getName()]) && gettype($peticion[$this->getName()]) == "string")  ? $peticion[$this->getName()] : "";

        return (($previousValue === "" && $this->getPlaceHolder() !== "") ? "<option hidden disabled selected value=''>". $this->getPlaceHolder() ."</option>":"") .
        array_reduce($this->getOpciones(), function(string $acumulador, Opcion $valores) use ($previousValue) {
            return $acumulador . "<option value='" . $valores->getValue() . "' value='". (($previousValue === $valores->getValue()) ? "selected" : "") ."' id='" . $valores->getId() . "'>". $valores->getLabel() . "</option>";
        }, "");
	}

    public function validarCampo(array $peticion): bool {
        $valido = false;

        if (isset($peticion[$this->getName()])){
            $values = array_map(function(Opcion $op) : string {
                return $op->getValue();
            }, $this->getOpciones());

            $valido = in_array($peticion[$this->getName()], $values);
        }
        
        return $valido;
	}
}


?>