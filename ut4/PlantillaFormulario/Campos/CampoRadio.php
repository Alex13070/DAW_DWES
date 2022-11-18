<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Opciones\Opcion;
use PlantillaFormulario\Utilidades\InputType;

class CampoRadio extends CampoMultiple {

    public function __construct(string $label = "", string $name = "", string $error) {
        parent::__construct($label, $name, InputType::RADIO_BUTTON, "", $error);
    }

    public function crearCampo(array $peticion): string {
        return "
        <div class='mb-3'>
            <label class='form-label'> " . $this->getLabel() . "</label>
            " . $this->contenidoCampo($peticion) . "
        </div>";        
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

	public function contenidoCampo(array $peticion): string {
        $retorno = "";
        $previo = (isset($peticion[$this->getName()]) && gettype($peticion[$this->getName()]) == "string")  ? $peticion[$this->getName()] : "";
        
        for($i = 0; $i < count($this->getOpciones()); $i++) {                      
            $retorno .= "
            <div class='form-check'>
                <input class='form-check-input' type='" . InputType::RADIO_BUTTON->value . "' name='" . $this->getName() . 
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