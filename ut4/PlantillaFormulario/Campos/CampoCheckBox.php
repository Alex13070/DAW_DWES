<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Opciones\OpcionCheck;
use PlantillaFormulario\Utilidades\Error;
use PlantillaFormulario\Utilidades\InputType;

class CampoCheckBox extends CampoMultiple {

    public function __construct(string $label = "", string $name = "", Error $error) {
        parent::__construct($label, $name, InputType::CHECKBOX, "", $error);
    }

    public function contenidoCampo() : string {
        return "<label class='form-label'>". $this->getLabel() ."</label>"       
            . array_reduce($this->getOpciones(), function(string $acumulador, OpcionCheck $opcion) {
                return $acumulador.$opcion->pintarOpcion();
            }, "");
    }  
	
    public function crearCheckbox(string $label, string $value, string $id, string $name) {
        $this->crearOpcion([
            "label" => $label,
            "value" => $value,
            "id" => $id,
            "name" => $name
        ]);
    }

	protected function crearOpcion(array $args) : void {
        $opcion = new OpcionCheck($args["label"], $args["value"], $args["id"], $args["name"]);
        $this->addOpcion($opcion);
	}
	
	function test(mixed $clave, mixed $valor): bool {
        return true;
	}

    public function getFormNames() : array {
        $array = [];

        foreach ($this->getOpciones() as $option) {
            $array[] = $option->name;
        }

        return [$array];
    }
}

?>

