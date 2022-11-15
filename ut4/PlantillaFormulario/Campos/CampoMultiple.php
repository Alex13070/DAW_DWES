<?php 

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Opciones\Opcion;
use PlantillaFormulario\Utilidades\InputType;

abstract class CampoMultiple extends Campo {

    private array $opciones;

    public function __construct(string $label = "", string $name = "", InputType $type, string $id = "", string $error) {
        parent::__construct($label, $name, $type, $id, $error);
        $this->opciones = [];
    }

    public function getOpciones() : array {
        return $this->opciones;
    }

    public final function addOpcion(Opcion $opcion) : void {
        $this->opciones[] = $opcion;
    }

    public abstract function validarCampo(array $peticion): bool;

    protected abstract function crearOpcion(array $args);



}