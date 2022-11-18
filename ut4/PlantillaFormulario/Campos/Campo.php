<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Utilidades\InputType;

abstract class Campo {

    private string $label;
    private string $name;
    private InputType $type;
    private string $id;
    private string $error;
    
    

    public function __construct(string $label, string $name, InputType $type, string $id, string $error) {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->id = $id;
        $this->error = $error;
    }

    public function getId() : string{
        return $this->id;
    }

    public function setId($id) : Campo{
        $this->id = $id;
        return $this;
    }
    
    public function getLabel() : string{
        return $this->label;
    }

    public function setLabel(string $label) : Campo {
        $this->label = $label;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name) : Campo {
        $this->name = $name;
        return $this;
    }

    public function getType() : InputType {
        return $this->type;
    }

    public function setType(InputType $type) : Campo {
        $this->type = $type;
        return $this;
    }

    public function getError() : string {
        return $this->error;
    }

    public function setError(string $error) : Campo {
        $this->error = $error;
        return $this;
    }

    public final function pintarError(): string {
        return "
        <div class='invalid-feedback'>
            $this->error
        </div>
        ";
        
    }

    public abstract function crearCampo(array $peticion) : string;

    public abstract function contenidoCampo(array $peticion) : string;
    
    public abstract function validarCampo(array $peticion) : bool;
    
    // public abstract function crearCampoValidado(array $peticion) : string;

    // public abstract function test(mixed $clave, mixed $valor) : bool;

    // public abstract function getFormNames(): array;

    // public abstract function contenidoValidado(array $peticion) : string;

}


?>