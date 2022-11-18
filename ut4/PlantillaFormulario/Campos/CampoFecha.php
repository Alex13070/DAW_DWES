<?php 

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Utilidades\Fecha;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\RegexPhp;

class CampoFecha extends CampoSimple {

    private Fecha|null $min;
    private Fecha|null $max;

    public function __construct(string $label, string $name, string $id, string $error, Fecha|null $min, Fecha|null $max) {
        parent::__construct($label, $name, InputType::DATE, $id, $error, RegexPhp::DATE);
        $this->min = $min;
        $this->max = $max;
    }

    public function contenidoCampo(array $peticion) : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . 
                "' name='". $this->getName() ."' value='" . $this->previousValue($peticion) . "' " . 
                (!is_null($this->min) ? "min='" . $this->min->toYYYYMMDD() . "'" : "") .
                (!is_null($this->max) ? "max='" . $this->max->toYYYYMMDD() . "'" : "") . "required >
        ";
    }

	public function validarCampo(array $peticion): bool {
        $valido = false;
        if (isset($peticion[$this->getName()])) {
            if (preg_match($this->getPattern()->value, $peticion[$this->getName()])) {
                try {
                    $fecha = Fecha::fromYYYYMMDD($peticion[$this->getName()], "-");

                    $valido = 
                        (is_null($this->min) || $this->min->anteriorA($fecha)) && 
                        (is_null($this->max) || $this->max->posteriorA($fecha));
                } catch (\Exception $e) {

                }
            }
            
        }

        return $valido;
	}
}

?>
