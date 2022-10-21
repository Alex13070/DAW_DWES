<?php 

class Coche {
    private string $matricula;
    private string $marca;
    private float $carga;
    
    /**
     * Get the value of matricula
     */ 
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */ 
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get the value of marca
     */ 
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */ 
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of carga
     */ 
    public function getCarga()
    {
        return $this->carga;
    }

    /**
     * Set the value of carga
     *
     * @return  self
     */ 
    public function setCarga($carga)
    {
        $this->carga = $carga;

        return $this;
    }

    public function __toString()
    {
        return "Coche: $this->matricula, $this->marca con carga: $this->carga";
    }

    public function pintarInformacion() {
        echo $this->__toString();
    }

    public function __construct(string $matricula = "", string $marca = "", int $carga = 0) {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->carga = $carga;
    }
}

?>