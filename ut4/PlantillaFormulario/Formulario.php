<?php

namespace PlantillaFormulario;

use PlantillaFormulario\Campos\Campo;
use PlantillaFormulario\Utilidades\HttpMethod;

class Formulario {

    private string $titulo;
    private string $action;
    private HttpMethod $method;
    private string $id;
    private array $campos;

    public function __construct(string $titulo = "", string $action = "", HttpMethod $method = HttpMethod::GET, string $id = "") {
        $this->titulo = $titulo;
        $this->action = $action;
        $this->method = $method;
        $this->id = $id; 
        $this->campos = [];      
    }

    public function addCampo(Campo $campo) {
        $this->campos[$campo->getName()] = $campo;
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

    public function getId(): string {
        return $this->id;
    }

    public function setId(string $id) : Formulario {
        $this->id = $id;
        return $this;
    }

    public function getTitulo() : string {
        return $this->titulo;
    }

    public function setTitulo(string $titulo) : Formulario {
        $this->titulo = $titulo;
        return $this;
    }

    public function crearFormulario() : string {
        return "
            <div class='card-body'>
                <form action='$this->action' method='" . $this->method->value . "' id='$this->id'>" 

                    . array_reduce($this->campos, function (string $acumulador, Campo $campo) {
                        return $acumulador.$campo->crearCampo();
                    }, "") .
                
                    "<div class='d-grid gap-2 col-6 mx-auto'>
                        <input type='submit' value='Enviar' class='btn btn-primary' name='enviar'>
                    </div>

                </form>
            </div>
        ";

    }

    public function pintarFormulario() {
        return "
        <div class='container'>
            <div class='row p-4'>
                <div class='col-lg-6 offset-lg-3'>
                    <div class='card text-right'>
                        <div class='card-header'> 
                            <h1 class='text-center'>$this->titulo</h1>
                        </div>
                        " . $this->crearFormulario() . "
                    </div>
                </div>
            </div>
        </div>
        ";
    }

    public function getAllFormNames () {
        $array = [];
        foreach ($this->campos as $campo) {
            foreach ($campo->getFormNames() as $name) {
                $array[] = $name;
            }
        }

        return $array;
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <link rel="stylesheet" href="../PlantillaFormulario/estilos.css">
</head>
</html>
