<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Opciones\OpcionRadio;
use PlantillaFormulario\Utilidades\Error;
use PlantillaFormulario\Utilidades\InputType;

class CampoRadio extends CampoMultiple {

    public function __construct(string $label = "", string $name = "", Error $error) {
        parent::__construct($label, $name, InputType::RADIO_BUTTON, "", $error);
    }

    public function contenidoCampo() : string {
        return "<label class='form-label'>". $this->getLabel() ."</label>"       
            . array_reduce($this->getOpciones(), function(string $acumulador, OpcionRadio $opcion) {
                return $acumulador.$opcion->pintarOpcion();
            }, "");
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