<?php

namespace PlantillaFormulario\Campos;

use PlantillaFormulario\Utilidades\Error;
use PlantillaFormulario\Utilidades\InputType;

abstract class Campo {

    private string $label;
    private string $name;
    private InputType $type;
    private string $id;
    private Error $error;

    /**
     * Aqui va una funcion que comprueba si lo que va dentro del campo es correcto.
     * Tiene que devolver true o false.
     */
    private mixed $test = null;

    public function getTest() : callable|null {
        return $this->test;
    }

    /**
     * Guarda la función para probar si el contenido del campo es correcto.
     * @param callable $test Funcion en la que se pone como validar el campo.
     */
    public function setTest(callable $test) {
        $this->test = $test;
        return $this;
    }

    

    public function __construct(string $label = "", string $name = "", InputType $type = InputType::TEXT, string $id = "", Error $error) {
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

    public function getError() : Error{
        return $this->error;
    }

    /**
     * Hay que poner un error con un mensaje descriptivo.
     * @param Error error a mostrar en caso de que el valor dado no sea bueno
     */
    public function setError(Error $error) : Campo {
        $this->error = $error;
        return $this;
    }

    public final function pintarError(): string {
        
        $retorno = "";

        if ($this->error->isActivado()) {
            $retorno = "<div class='form-text text-danger'>{$this->error->getMensaje()}</div> ";
        }

        return $retorno;
    }

    public final function crearCampo() : string {
        return "
        <div class='mb-3'>
            " . $this->contenidoCampo() . $this->pintarError() . "
        </div>
        ";
    }

    public abstract function contenidoCampo() : string;

    public abstract function test(mixed $clave, mixed $valor) : bool;

    public abstract function getFormNames(): array;

}


?>