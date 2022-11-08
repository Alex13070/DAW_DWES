<?php

namespace PlantillaFormulario\Opciones;
use PlantillaFormulario\InputType;
use PlantillaFormulario\Utilidades\InputType as UtilidadesInputType;

/**
 * Tienen que tener todos el mismo name
 */
class OpcionRadio extends Opcion{
    private string $id;
    private string $name;

    public function __construct(string $label, string $value, string $id, string $name) {
        parent::__construct($label, $value);
        $this->id = $id;
        $this->name = $name;
    }

    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name) : OpcionRadio {
        $this->name = $name;
        return $this;
    }

    public function getId() : string {
        return $this->id;
    }

    public function setId(string $id) : OpcionRadio {
        $this->id = $id;
        return $this;
    }


    public function pintarOpcion() : string {
        return "
        <div class='form-check'>
            <input class='form-check-input' type='" . UtilidadesInputType::RADIO_BUTTON->value . "' name='" . $this->name . "' id='". $this->id ."' value='" . $this->getValue() . "'>
            <label class='form-check-label' for='" . $this->id . "'> " . $this->getLabel() . " </label> 
        </div>
        ";
    }

    
}

?>