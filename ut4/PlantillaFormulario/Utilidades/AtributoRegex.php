<?php 

namespace PlantillaFormulario\Utilidades;

trait AtributoRegex {
    private RegexPhp $pattern;

    public function getPattern() : RegexPhp{
        return $this->pattern;
    }

    public function setPattern(RegexPhp $pattern) : mixed{
        $this->pattern = $pattern;
        return $this;
    }
}