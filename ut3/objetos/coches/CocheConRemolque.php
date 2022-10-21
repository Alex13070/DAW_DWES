<?php 

class CocheConRemolque extends Coche {
    
    private float $remolque;

    /**
     * Get the value of remolque
     */ 
    public function getRemolque()
    {
        return $this->remolque;
    }

    /**
     * Set the value of remolque
     *
     * @return  self
     */ 
    public function setRemolque(float $remolque)
    {
        $this->remolque = $remolque;

        return $this;
    }

    public function __construct(string $matricula = "", string $marca = "", int $carga = 0, float $remolque = 0) {
        parent::__construct($matricula, $marca, $carga);
        $this->remolque = $remolque;
    }

    public function __toString() {
        return parent::__toString()." y remolque de $this->remolque";      
    }

    public function pintarInformacion() {
        echo self::__toString();
    }

}


?>