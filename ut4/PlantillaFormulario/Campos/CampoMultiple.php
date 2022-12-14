<?php 

namespace ut4\PlantillaFormulario\Campos;

use ut4\PlantillaFormulario\Opciones\Opcion;
use ut4\PlantillaFormulario\Utilidades\InputType;

abstract class CampoMultiple extends Campo {

    private array $opciones;

    public function __construct(string $label, string $name, InputType $type, string $id, string $error) {
        parent::__construct($label, $name, $type, $id, $error);
        $this->opciones = [];
    }

    public function getOpciones() : array {
        return $this->opciones;
    }

    public final function addOpcion(Opcion...$opciones) : void {
        $this->opciones = array_merge($this->opciones, $opciones);
    }

}