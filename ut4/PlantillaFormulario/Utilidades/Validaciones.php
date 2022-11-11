<?php

namespace PlantillaFormulario\Utilidades;

use Exception;
use PlantillaFormulario\Utilidades\HttpMethod;
use PlantillaFormulario\Utilidades\RegexPhp;

class Validaciones {
    
    private array $peticion;

    public function __construct(HttpMethod $metodo){
        switch ($metodo) {
            case HttpMethod::GET:
                $this->peticion = $_GET;
                break;
            case HttpMethod::POST:
                $this->peticion = $_POST;
                break;
            default:
                throw new Exception("Metodo no soportado");
        }
    }

    public function validarNombre(string $campoNombre) : string | null {
        return $this->validar(RegexPhp::NOMBRE, $campoNombre) ? $this->peticion[$campoNombre] : null;
    }
    
    public function validarNumero(string $campoNumero ) : int|null {
        return $this->validar(RegexPhp::NUMERO, $campoNumero) ? intval($this->peticion[$campoNumero]) : null;
    }

    public function validarNumeroConRangos(string $campoNumero, int $min, int $max) : int|null {
        $return = null;
        if ($this->validar(RegexPhp::NUMERO, $campoNumero)) {
            $numero = intval($this->peticion[$campoNumero]);
            if ($numero >= $min && $numero <= $max) {
                $return = $numero;
            }
        }
        return $return;
    }

    public function validarTelefono(string $campoTelefono) : string|null{
        return $this->validar(RegexPhp::TELEFONO, $campoTelefono) ? $this->peticion[$campoTelefono] : null;
     }

    public function validarCorreo(string $campoCorreo) : string|null{
        return $this->validar(RegexPhp::CORREO, $campoCorreo) ? $this->peticion[$campoCorreo] : null;
    }
    
    private function validar(RegexPhp $regex, string $campo ) : bool {
        return isset($this->peticion[$campo]) && preg_match($regex->value, $this->peticion[$campo]);
    }

    

}

?>