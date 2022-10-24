<?php 

class Usuario {

    public const CANTIDAD_VICTORIAS = 6; 
    public const NIVEL_MAXIMO = 6; 
    public const NIVEL_MINIMO = 0; 

    private string $nombre;
    private string $apellidos;
    private string $deporte;
    private int $nivel;
    private array $resultados;

    /**
     * Get the value of nombre
     */ 
    public function getNombre(): string {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
        echo "Uso funcion padre $this->nombre<br>";
        return $this;
    }

     /**
     * Get the value of apellidos
     */ 
    public function getApellidos() : string {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos(string $apellidos) : Usuario {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * Get the value of deporte
     */ 
    public function getDeporte() : string {
        return $this->deporte;
    }

    /**
     * Set the value of deporte
     *
     * @return  self
     */ 
    public function setDeporte(string $deporte) : Usuario {
        $this->deporte = $deporte;
        return $this;
    }

    /**
     * Get the value of nivel
     */ 
    public function getNivel() : int {
        return $this->nivel;
    }

    /**
     * Get the value of resultados
     */ 
    public function getResultados() : array {
        return $this->resultados;
    }

    public function __construct(string $nombre = "", string $apellidos = "", string $deporte = "") {
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setDeporte($deporte);
        $this->nivel = 0;
        $this->resultados = [];
    }

    public function introducirResultado(Resultado $resultado) {
        $this->resultados[] = $resultado;
        $msg = $this->getNombre()." registra una $resultado->value. ";
        
        //$nivel = self::calcularNivelGeneral();
        //$msg = ($nivel > $this->nivel) ? "$this->nombre ha subido de nivel":"$this->nombre ha bajado de nivel";
        //$this->nivel = $nivel;

        $respuesta = self::comprobarResultados($resultado);

        if ($respuesta > 0 && $this->nivel < self::NIVEL_MAXIMO) {
            $this->nivel++;
            $msg .= $this->getNombre()." ha subido al nivel $this->nivel";
            
        }
        elseif ($respuesta < 0 && $this->nivel > self::NIVEL_MINIMO) {
            $this->nivel--;
            $msg .= "$this->nombre ha bajado al nivel $this->nivel";
        }
        
        echo $msg."<br><br>";
        
    }

    
    private function comprobarResultados(Resultado $actual): int {
        
        if ($actual == Resultado::EMPATE) {
            return 0;
        }



        $sigo = true;
        $contador = 0;

        for ($i=(count($this->resultados)-1); $i >= 0 && $sigo; $i--) { 
            if ($this->resultados[$i] == $actual) 
                $contador++;
            else 
                $sigo = false;
        }

        $retorno = 0;

        if ($contador % static::CANTIDAD_VICTORIAS == 0 ) {
            $retorno = ($actual === Resultado::VICTORIA) ? 1 : -1;
        }
        return $retorno;
    }

    public function calcularNivelGeneral(): int {
        $nivel = 0;
        $anterior = null;
        $contador = 0;

        foreach($this->resultados as $resultado){
            switch ($anterior) {
                case Resultado::VICTORIA:
                case Resultado::DERROTA:
                    if ($anterior == $resultado) {
                        $contador++;
                    }
                    else {
                        $contador = 1;
                    }
                    break;
                case Resultado::EMPATE;
                    $contador = 0;
                    break;
                default:
                    if ($resultado != Resultado::EMPATE) {
                        $contador++;
                    }
                    break;
            }

            if ($contador == self::CANTIDAD_VICTORIAS) {
                if ($resultado === Resultado::VICTORIA && $nivel < self::NIVEL_MAXIMO) {
                    $nivel++;
                }
                elseif ($nivel > self::NIVEL_MINIMO) {
                    $nivel--;
                }

                $contador = 0;
                $anterior = null;
            }
            else {
                $anterior = $resultado;
            }
        }

        return $nivel;  
    }

    private function pintarResultados() : string {
        return "<ul>".
            array_reduce($this->resultados, function(string $carry, Resultado $actual) {
                return $carry."<li>$actual->value</li>";
            }, "")
            ."</ul>";
    }

    public function __toString() : string {
        return "Nombre: " . $this->getNombre() . ", Apellidos: $this->apellidos, Deporte: $this->deporte, Nivel: $this->nivel".self::pintarResultados();
    }

    public final function imprimirInformacion() {
        echo "<p class='campo-usuario'>".$this->__toString()."</p>";
    }
}

?>