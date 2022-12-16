<?php 

namespace ej2;

abstract class AExamen implements IExamen {

    use TieneFecha;

    // Constantes por defecto, por si los hijos no los rescriben.
    const NOTA_MINIMA = 0;
    const NOTA_MAXIMA = 10;

    private string $nombre;

    public function __construct(string $nombre = "", string $fecha = "") {
        $this->nombre = $nombre;
        $this->setFecha($fecha);
    } 

    public function intentar(string $nombre) : void {
        $this->nombre = $nombre;
    }

    public function getNombre() : string{
        return $this->nombre;
    }

}