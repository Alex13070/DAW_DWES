<?php 

namespace PlantillaFormulario\Opciones;


class OpcionSelect extends Opcion {

    public function __construct(string $label, string $value) {
        parent::__construct($label, $value);
    }

	public function pintarOpcion() : string {
        return "<option value='" . $this->getValue() ."'>" . $this->getLabel() . "</option>";
    }
}


?>