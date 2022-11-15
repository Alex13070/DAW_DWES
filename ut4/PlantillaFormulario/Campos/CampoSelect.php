<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Opciones\OpcionSelect;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\Placeholder;

class CampoSelect extends CampoMultiple {

    use Placeholder;

    public function __construct(string $label = "", string $name = "", string $placeholder = "", string $id ="", string $error = "") {
        parent::__construct($label, $name, InputType::SELECT, $id, $error);
        $this->placeholder = $placeholder;
    }

    public function contenidoCampo() : string {
        return (($this->getPlaceHolder() !== "") ? "<option hidden disabled selected value=''>". $this->getPlaceHolder() ."</option>":"") .
        array_reduce($this->getOpciones(), function(string $acumulador, OpcionSelect $actual) {
            return $acumulador . "<option value='" . $actual->getValue() ."'>" . $actual->getLabel() . "</option>";
        }, "");       
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

	public function crearCampo(): string {
        return "
        <div class='mb-3'>
            <label class='form-label'>". $this->getLabel() ."</label>
            <select class='form-select' aria-label='Default select example' name='". $this->getName() ."' id='" . $this->getId() . "' required>
                " . $this->contenidoCampo() . "
            </select> 
        </div>
        ";
	}

    public function crearCampoValidado(array $peticion): string {
        return "
        <div class='mb-3'>
            <label class='form-label'>". $this->getLabel() ."</label>
            <select class='form-select' aria-label='Default select example' name='". $this->getName() ."' id='" . $this->getId() . "' required>
                " . $this->contenidoValidado($peticion) . "
            </select> 
        </div>
        ";
	}

    public function contenidoValidado(array $peticion): string {

        $previo = (isset($peticion[$this->getName()]) && gettype($peticion[$this->getName()]) == "string")  ? $peticion[$this->getName()] : "";

        return (($previo === "" && $this->getPlaceHolder() !== "") ? "<option hidden disabled selected value=''>". $this->getPlaceHolder() ."</option>":"") .
        array_reduce($this->getOpciones(), function(string $acumulador, OpcionSelect $actual) use ($previo) {
            return $acumulador . "<option value='" . $actual->getValue() ."' value='". (($previo === $actual->getValue()) ? "selected" : "") ."'>" . $actual->getLabel() . "</option>";
        }, "");
	}

    public function validarCampo(array $peticion): bool {
        $valido = false;

        if (isset($peticion[$this->getName()])){
            $values = array_map(function(OpcionSelect $op) : string {
                return $op->getValue();
            }, $this->getOpciones());

            $valido = in_array($peticion[$this->getName()], $values);
        }
        
        return $valido;
	}

}


?>