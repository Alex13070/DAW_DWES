<?php

namespace ut4\PlantillaFormulario;

use Exception;
use ut4\PlantillaFormulario\Campos\Campo;
use ut4\PlantillaFormulario\Utilidades\HttpMethod;

abstract class Formulario {

    private string $titulo;
    private string $action;
    private HttpMethod $method;
    
    // private string $id;
    private array $campos;

    public function __construct(string $titulo = "", string $action = "", HttpMethod $method = HttpMethod::GET/*, string $id = "" */) {
        $this->titulo = $titulo;
        $this->action = $action;
        $this->method = $method;
        // $this->id = $id; 
        $this->campos = [];      
    }

    public final function addCampo(Campo $campo) {
        $this->campos[] = $campo;
    }

    public function getCampos() : array {
        return $this->campos;
    }

    public function getAction() : string {
        return $this->action;
    }

    public function setAction(string $action) : Formulario {
        $this->action = $action;
        return $this;
    }

    public function getMethod(): HttpMethod {
        return $this->method;
    }

    public function setMethod(HttpMethod $method) : Formulario {
        $this->method = $method;
        return $this;
    }

    // public function getId(): string {
    //     return $this->id;
    // }

    // public function setId(string $id) : Formulario {
    //     $this->id = $id;
    //     return $this;
    // }

    public function getTitulo() : string {
        return $this->titulo;
    }

    public function setTitulo(string $titulo) : Formulario {
        $this->titulo = $titulo;
        return $this;
    }

    public final function crearFormulario(bool $mostrarErrores) : string {
        return $this->plantillaFormulario(array_reduce($this->campos, function (string $acumulador, Campo $campo) { 
            return $acumulador. $campo->crearCampo($this->peticion());
        }, ""), $mostrarErrores);
    }

    // public final function crearFormularioValidado() : string {
    //     return $this->plantillaFormulario(array_reduce($this->campos, function (string $acumulador, Campo $campo) {     
    //         return $acumulador. $campo->crearCampoValidado($this->peticion());
    //     }, ""), true);
    // }

    private function plantillaFormulario(string $campos, bool $mostrarErrores) : string {
        return "
        <div class='card text-right'>
            <div class='card-header'> 
                <h1 class='text-center'>$this->titulo</h1>
            </div>
            <div class='card-body'>
                <form action='$this->action' method='" . $this->method->value . "' id='formulario' class='needs-validation " . ($mostrarErrores ? "was-validated":"") . "' novalidate> 
                    $campos
                    <div class='d-grid gap-2 mx-auto'>
                        <input type='submit' value='Enviar' class='btn btn-primary' name='enviar'>
                    </div>
                </form>
            </div>
        </div>
        ";
    }
/*
    public final function pintarFormulario() {
        return "
        <div class='container'>
            <div class='row p-4'>
                <div class='col-lg-6 offset-lg-3'>
                    " . $this->crearFormulario() . "
                </div>
            </div>
        </div>
        ";
    }
*/
    public final function validarFormulario () : bool{
        return array_reduce($this->campos, function (bool $acumulador, Campo $campo) : bool {
            return $acumulador && $campo->validarCampo($this->peticion());
        }, true);
    }

    protected final function peticion() : array {
        $array = null;

        switch ($this->method) {
            case HttpMethod::GET:
                $array = $_GET;
                break;
            case HttpMethod::POST:
                $array = $_POST;
                break;
            default:
                throw new Exception("Método no soportado.");
        }
        return $array;

    }

    public abstract function crearObjeto() : mixed;  
    
    //public abstract function accionFormulario() : string;
}

?>