<?php

namespace PlantillaFormulario;

use stdClass;

class CampoSelect extends Campo {

    private array $opciones;

    public function __construct(string $label = "", string $name = "", string $placeholder = "", string $id ="", Error $error) {
        parent::__construct($label, $name, InputType::RADIO_BUTTON, $placeholder, $id, $error);
        $this->opciones = [];
    }

    public function addOpcion(string $nombre, string|int $valor) {
        $opcion = new stdClass();

        $opcion->nombre = $nombre;
        $opcion->valor = $valor;

        $this->opciones[] = $opcion;

    }

    public function contenidoCampo() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <select class='form-select' aria-label='Default select example' name='". $this->getName() ."' id='" . $this->getId() . "'>
                <option selected style='display: none'>". $this->getPlaceHolder() ."</option>
                "
                    . array_reduce($this->opciones, function(string $acumulador, mixed $opcion) {
                        return $acumulador.$this->pintarOpcion($opcion);
                    }, "") .
                "
            </select> 
        ";
    }    

    private function pintarOpcion(mixed $opcion) : string {
        return "<option value='$opcion->valor'>$opcion->nombre</option>";
    }
}


?>