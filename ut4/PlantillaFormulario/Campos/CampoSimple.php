<?php

namespace ut4\PlantillaFormulario\Campos;

use ut4\PlantillaFormulario\Campos\Campo;
use ut4\PlantillaFormulario\Utilidades\InputType;
use ut4\PlantillaFormulario\Utilidades\RegexPhp;

abstract class CampoSimple extends Campo{

    private RegexPhp $pattern;

    public function __construct(string $label, string $name, InputType $type, string $id, string $error, RegexPhp $pattern) {
        parent::__construct($label, $name, $type, $id, $error);
        $this->pattern = $pattern;
    }

    public function getPattern() : RegexPhp{
        return $this->pattern;
    }

    public function setPattern(RegexPhp $pattern) : mixed{
        $this->pattern = $pattern;
        return $this;
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