<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Campos\Campo;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\RegexPhp;

abstract class CampoSimple extends Campo{

    

    public function __construct(string $label, string $name, InputType $type, string $id, string $error) {
        parent::__construct($label, $name, $type, $id, $error);
    }

    public final function crearCampo(array $peticion): string {
        return "
        <div class='mb-3'>
            " . $this->contenidoCampo($peticion) . $this->pintarError() . "
        </div>
        ";
    }

    protected final function previousValue(array $peticion) : string {
        return isset($peticion[$this->getName()]) ? $peticion[$this->getName()] : "";
    }
}