<?php 

namespace PlantillaFormulario\Opciones;

abstract class Opcion {

    private string $label;
    private string $value;


    public function __construct(string $label, string $value) {
        $this->label = $label;
        $this->value = $value;
    }
 
    public function getLabel() : string {
        return $this->label;
    }

    public function setLabel(string $label) : Opcion{
        $this->label = $label;
        return $this;
    }

    public function getValue() : string {
        return $this->value;
    }

    public function setValue(string $value) : Opcion {
        $this->value = $value;
        return $this;
    }

    public abstract function pintarOpcion();
}

?>
