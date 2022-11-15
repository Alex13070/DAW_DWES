<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Opciones\OpcionCheck;
use PlantillaFormulario\Utilidades\InputType;

class CampoCheckBox extends CampoMultiple {

    public function __construct(string $label = "", string $name = "", string $error) {
        parent::__construct($label, $name, InputType::CHECKBOX, "", $error);
    }

    public function contenidoCampo() : string {
        $retorno = "";
        for($i = 0; $i < count($this->getOpciones()); $i++) { // id, nombre, label, value                        
            $retorno .= "
            <div class='form-check'>
                <input class='form-check-input' type='" . InputType::CHECKBOX->value . "' name='" . $this->getOpciones()[$i]->getName() 
                    . "' id='" . $this->getOpciones()[$i]->getId() . "' value='" . $this->getOpciones()[$i]->getValue() . "'>
                <label class='form-check-label' for='" . $this->getOpciones()[$i]->getId() . "'> " . $this->getOpciones()[$i]->getLabel() . " </label>
            " . (($i == count($this->getOpciones())-1)?"<div class='invalid-feedback'>" . $this->getError() . "</div>":"") . "
            </div>";
        } 
        
        return $retorno;
    }  
	
    public function crearCheckbox(string $label, string $value, string $id) {
        $this->crearOpcion([
            "label" => $label,
            "value" => $value,
            "id" => $id
        ]);
    }

	protected function crearOpcion(array $args) : void {
        $opcion = new OpcionCheck($args["label"], $args["value"], $args["id"], $this->getName()."[]");
        $this->addOpcion($opcion);
	}

	public function crearCampo(): string {
        return "
        <div class='mb-3'>
            <label class='form-label'>" . $this->getLabel() ."</label>
            " . $this->contenidoCampo() . "
        </div>";        
	}

    public function crearCampoValidado(array $peticion): string {
        return "
        <div class='mb-3'>
            <label class='form-label'>" . $this->getLabel() ."</label>
            " . $this->contenidoValidado($peticion) . "
        </div>";        
	}

    public function validarCampo(array $peticion): bool {
        $valido = false;

        
        if (isset($peticion[$this->getName()])){
            $values = array_map(function(OpcionCheck $op) : string {
                return $op->getValue();
            }, $this->getOpciones());

            
            $pruebas = array_filter(array_values(array_unique($peticion[$this->getName()])), function (string $valor) use ($values) {
                return in_array($valor, $values);
            });
            
            $valido = count($pruebas) == count($peticion[$this->getName()]);
        }
        
        return $valido;
	}

    public function contenidoValidado(array $peticion): string {

        $previo = (isset($peticion[$this->getName()]) && gettype($peticion[$this->getName()]) == "array")  ? $peticion[$this->getName()] : [];
        $retorno = "";
        
        for($i = 0; $i < count($this->getOpciones()); $i++) { // id, nombre, label, value       
            $retorno .= "
            <div class='form-check'>
                <input class='form-check-input' type='" . InputType::CHECKBOX->value . "' name='" . $this->getOpciones()[$i]->getName() 
                    . "' id='" . $this->getOpciones()[$i]->getId() . "' value='" . $this->getOpciones()[$i]->getValue() 
                    . "' " . (in_array($this->getOpciones()[$i]->getValue(), $previo) ? "checked" : "") . ">
                <label class='form-check-label' for='" . $this->getOpciones()[$i]->getId() . "'> " . $this->getOpciones()[$i]->getLabel() . " </label>
            " . (($i == count($this->getOpciones())-1)?"<div class='invalid-feedback'>" . $this->getError() . "</div>":"") . "
            </div>";
        } 
        
        return $retorno;
	}
	
}

?>

