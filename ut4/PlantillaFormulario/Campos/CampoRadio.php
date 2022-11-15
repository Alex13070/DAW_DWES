<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Opciones\OpcionRadio;
use PlantillaFormulario\Utilidades\InputType;

class CampoRadio extends CampoMultiple {

    public function __construct(string $label = "", string $name = "", string $error) {
        parent::__construct($label, $name, InputType::RADIO_BUTTON, "", $error);
    }

    public function contenidoCampo() : string {
        $retorno = "";
        
        for($i = 0; $i < count($this->getOpciones()); $i++) { // id, nombre, label, value                        
            $retorno .= "
            <div class='form-check'>
                <input class='form-check-input' type='" . InputType::RADIO_BUTTON->value . "' name='" . $this->getOpciones()[$i]->getName() . "' id='". $this->getOpciones()[$i]->getId() ."' value='" . $this->getOpciones()[$i]->getValue() . "' required>
                <label class='form-check-label' for='" . $this->getOpciones()[$i]->getId() . "'> " . $this->getOpciones()[$i]->getLabel() . " </label> 
            " . (($i == count($this->getOpciones())-1)?"<div class='invalid-feedback'>" . $this->getError() . "</div>":"") . "
            </div>";
        }

        return $retorno;
    } 

    public function crearRadio(string $label, string $value, string $id) {
        $this->crearOpcion([
            "label" => $label,
            "value" => $value,
            "id" => $id
        ]);
    }

	protected function crearOpcion(array $args) : void {
        $opcion = new OpcionRadio($args["label"], $args["value"], $args["id"], $this->getName());
        $this->addOpcion($opcion);
	}

	public function crearCampo(): string {
        return "
        <div class='mb-3'>
            <label class='form-label'> " . $this->getLabel() . "</label>
            " . $this->contenidoCampo() . "
        </div>";        
	}

    public function crearCampoValidado(array $peticion): string {
        return "
        <div class='mb-3'>
            <label class='form-label'> " . $this->getLabel() . "</label>
            " . $this->contenidoValidado($peticion) . "
        </div>";        
	}

    

    public function validarCampo(array $peticion): bool {
        $valido = false;

        if (isset($peticion[$this->getName()])){
            
            $values = array_map(function(OpcionRadio $op) : string {
                return $op->getValue();
            }, $this->getOpciones());
            
            $valido = in_array($peticion[$this->getName()], $values);
        }
        
        return $valido;
	}

	public function contenidoValidado(array $peticion): string {
        $retorno = "";
        $previo = (isset($peticion[$this->getName()]) && gettype($peticion[$this->getName()]) == "string")  ? $peticion[$this->getName()] : "";
        
        for($i = 0; $i < count($this->getOpciones()); $i++) { // id, nombre, label, value                        
            $retorno .= "
            <div class='form-check'>
                <input class='form-check-input' type='" . InputType::RADIO_BUTTON->value . "' name='" . $this->getOpciones()[$i]->getName() . 
                "' id='". $this->getOpciones()[$i]->getId() ."' value='" . $this->getOpciones()[$i]->getValue() . 
                "' " . (($previo == $this->getOpciones()[$i]->getValue()) ? "checked" : "") . " required>

                <label class='form-check-label' for='" . $this->getOpciones()[$i]->getId() . "'> " . $this->getOpciones()[$i]->getLabel() . " </label> 
            " . (($i == count($this->getOpciones())-1)?"<div class='invalid-feedback'>" . $this->getError() . "</div>":"") . "
            </div>";
        }

        return $retorno;
    } 
}


?>