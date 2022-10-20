<?php 

class Circulo {
    private const PI = 3.14;
    private int $radio;

    public function __construct(int $radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return self::PI * pow($this->radio, 2);
    }

    public function getRadio() {
        return $this->radio;
    }

    public function setRadio(int $radio) {
        $this->radio = $radio;
    }
}

?>