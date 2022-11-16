<?php 

namespace Prueba;
use Exception;

class Usuario implements LeerEscribirCSV {

    public const NOMBRE_USUARIO = "usuario";
    public const CLAVE_USUARIO = "password";
    public const SEXO_USUARIO = "sexo";
    public const EDAD_USUARIO = "edad";
    public const IDIOMAS_USUARIO = "idiomas";
    public const ESTUDIOS_USUARIO = "estudios";

    public const EDAD_MINIMA = 18;
    public const EDAD_MAXIMA = 100;
    private string $usuario;
    private string $clave;
    private Sexo $sexo;
    private int $edad;
    private Estudios $estudios;
    private array $idiomas;

    public function __construct(string $usuario, string $clave, Sexo $sexo, int $edad, Estudios $estudios) {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->sexo = $sexo;
        $this->setEdad($edad);
        $this->estudios = $estudios;
        $this->idiomas = [];
    }

    public function getUsuario() : string {
        return $this->usuario;
    }

    public function setUsuario(string $usuario) : Usuario {
        $this->usuario = $usuario;
        return $this;
    }

    public function getClave() : string {
        return $this->clave;
    }

    public function setClave(string $clave) : Usuario {
        $this->clave = $clave;
        return $this;
    }

    public function getSexo() : Sexo{
        return $this->sexo;
    }

    public function setSexo(Sexo $sexo) : Usuario{
        $this->sexo = $sexo;
        return $this;
    }

    public function getEdad() : int {
        return $this->edad;
    }

    public function setEdad(int $edad) : Usuario {
        if ($edad < Usuario::EDAD_MINIMA || $edad > Usuario::EDAD_MAXIMA) {
            throw new Exception("La edad debe de estar entre (". self::EDAD_MINIMA . "-" . self::EDAD_MAXIMA . ")", 1);
        }

        $this->edad = $edad;
        return $this;
    }

    public function getEstudios() : Estudios {
        return $this->estudios;
    }

    public function setEstudios(Estudios $estudios) : Usuario {
        $this->estudios = $estudios;
        return $this;
    }

    public function getIdiomas() : array {
        return $this->idiomas;
    }

    public function addIdioma(Idioma $idioma) : Usuario {
        $this->idiomas[] = $idioma;
        return $this;
    }
	
    public static function fromCSV(string $linea) : Usuario|null {
        $array = explode(";", $linea);

        $usuario = null;

        try {
            $usuario = new Usuario(
                $array[0],
                $array[1],
                Sexo::from($array[2]),
                intval($array[3]),
                Estudios::from($array[4])
            );

            for($i = 6; $i < $array[5]; $i++) {
                $usuario->addIdioma(Idioma::from($array[$i]));
            }
        }
        catch (Exception $e) {
            
        }

        return $usuario;

    }

    public function toCSV() : string {
        
        return $this->usuario . ";" . 
            $this->clave . ";" . 
            $this->sexo->value . ";" . 
            $this->edad . ";" . 
            $this->estudios->value . ";" . 
            count($this->idiomas) . 
            array_reduce($this->idiomas, function (string $acumulador, Idioma $estudios) : string {
                return $acumulador . ";" . $estudios->value;
            }, "");
    }

}

?>