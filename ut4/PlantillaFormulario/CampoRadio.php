<?php

namespace PlantillaFormulario;

use stdClass;

class CampoRadio extends Campo {

    private array $opciones;

    public function __construct(string $label = "", string $name = "", Error $error) {
        parent::__construct($label, $name, InputType::RADIO_BUTTON, "", "", $error);
        $this->opciones = [];
    }

    public function addOpcion(string $nombreOpcion, string $id, string $value) {
        $opcion = new stdClass();

        $opcion->nombreOpcion = $nombreOpcion;
        $opcion->id = $id;
        $opcion->value = $value;

        $this->opciones[] = $opcion;

    }

    public function contenidoCampo() : string {
        return "<label class='form-label'>". $this->getLabel() ."</label>"       
            . array_reduce($this->opciones, function(string $acumulador, mixed $opcion) {
                return $acumulador.$this->pintarOpcion($opcion);
            }, "");
    }    

    private function pintarOpcion(mixed $opcion) : string {
        return "
            <div class='form-check'>
                <input class='form-check-input' type='" . $this->getType()->value . "' name='" . $this->getName() . "' id='". $opcion->id ."' value='" . $opcion->value . "'>
                <label class='form-check-label' for='" . $opcion->id . "'> " . $opcion->nombreOpcion . " </label> 
            </div>
        ";
    }
}


?>