<?php

namespace PlantillaFormulario;

class Campo {

    private string $label;
    private string $name;
    private InputType $type;
    private string $placeholder;
    private string $id;
    private Error $error;

    public function __construct(string $label = "", string $name = "", InputType $type = InputType::TEXT, string $placeholder = "", string $id = "", Error $error) {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
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

    public function getPlaceholder() : string {
        return $this->placeholder;
    }

    public function setPlaceholder(string $placeholder) : Campo{
        $this->placeholder = $placeholder;
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
     * @param $error error a mostrar en caso de que el valor dado no sea bueno
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

    protected function contenidoCampo() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."'>
        ";
    }

}


?>