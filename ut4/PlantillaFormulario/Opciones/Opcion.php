<?php 

namespace ut4\PlantillaFormulario\Opciones;

class Opcion {

    private string $label;
    private string $value;
    private string $id;

    public function __construct(string $label, string $value, string $id) {
        $this->label = $label;
        $this->value = $value;
        $this->id = $id;
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

    public function setId(string $id) : Opcion {
        $this->id = $id;
        return $this;
    }

    public function getId() : string {
        return $this->id;
    }

}

?>
