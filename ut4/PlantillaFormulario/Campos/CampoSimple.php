<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Campos\Campo;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\RegexPhp;

abstract class CampoSimple extends Campo{

    private RegexPhp $pattern;

    public function __construct(string $label = "", string $name = "", InputType $type = InputType::TEXT, string $id = "", string $error, RegexPhp $pattern) {
        parent::__construct($label, $name, $type, $id, $error);
        $this->pattern = $pattern;
    }

    public final function crearCampo(): string {
        return "
        <div class='mb-3'>
            " . $this->contenidoCampo() . $this->pintarError() . "
        </div>
        ";
    }

    public final function crearCampoValidado(array $peticion): string {
        return "
        <div class='mb-3'>
            " . $this->contenidoValidado($peticion) . $this->pintarError() . "
        </div>
        ";
    }

    public function getPattern() : RegexPhp{
        return $this->pattern;
    }

    public function setPattern(RegexPhp $pattern) : Campo{
        $this->pattern = $pattern;
        return $this;
    }

    protected function previousValue(array $peticion) : string {
        return isset($peticion[$this->getName()]) ? $peticion[$this->getName()] : "";
    }
}