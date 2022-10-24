<?php

class CocheGrua extends Coche {

    
    private ?Coche $cocheCargado;

    public function __construct(string $matricula = "", string $marca = "", int $carga = 0, Coche $cocheCargado = null) {
        parent::__construct($matricula, $marca, $carga);
        $this->cocheCargado = $cocheCargado;
    }

    public function cargar(Coche $coche) {

        if ($this->cocheCargado != null) {
            throw new Exception("Ya lleva un coche carga.");
        }
        $this->cocheCargado = $coche;
    }

    public function descargar() {
        $this->cocheCargado = null;
    }

    public function __toString() {
        return parent::__toString()."<br>". ((is_null($this->cocheCargado)) ?"No lleva ningún coche.":"Lleva ".$this->cocheCargado->__toString());      
    }

    public function pintarInformacion() {
        echo self::__toString();
    }

    /**
     * Get the value of cocheCargado
     */ 
    public function getCocheCargado()
    {
        return $this->cocheCargado;
    }

    /**
     * Set the value of cocheCargado
     *
     * @return  self
     */ 
    public function setCocheCargado(Coche $cocheCargado)
    {
        $this->cocheCargado = $cocheCargado;

        return $this;
    }
}


?>