<?php

namespace Prueba;

use PlantillaFormulario\Campos\CampoCheckBox;
use PlantillaFormulario\Campos\CampoNumber;
use PlantillaFormulario\Campos\CampoRadio;
use PlantillaFormulario\Campos\CampoSelect;
use PlantillaFormulario\Campos\CampoTexto;
use PlantillaFormulario\Formulario;
use PlantillaFormulario\Utilidades\HttpMethod;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\RegexPhp;

class FormularioUsuario extends Formulario{    

    public function __construct() {
        parent::__construct("Prueba formulario", "index.php", HttpMethod::GET);

        $campoUsuario = new CampoTexto (
            label: "Usuario", 
            name: Usuario::NOMBRE_USUARIO, 
            type: InputType::TEXT, 
            placeholder: "Usuario", 
            id: "usuario", 
            error: "El nombre de usuario no es correcto", 
            pattern: RegexPhp::NOMBRE
        );

        $campoClave = new CampoTexto (
            label: "Contraseña",
            name: Usuario::CLAVE_USUARIO, 
            type: InputType::PASSWORD, 
            placeholder: "Contraseña", 
            id: "password", 
            error: "La clave debe de tener *sample text*", 
            pattern: RegexPhp::NOMBRE
        );

        $campoSexo = new CampoRadio(
            label: "Sexo", 
            name: Usuario::SEXO_USUARIO, 
            error: "Debes marcar al menos un sexo."
        );


        $campoSexo->crearRadio(
            label: "Hombre", 
            value: Sexo::HOMBRE->value, 
            id: "hombre"
        );


        $campoSexo->crearRadio(
            label: "Mujer", 
            value: Sexo::MUJER->value, 
            id: "mujer"
        );

        $campoSexo->crearRadio(
            label: "Otro", 
            value: Sexo::OTRO->value, 
            id: "otro"
        );

        $campoEdad = new CampoNumber(
            label: "Edad", 
            name: Usuario::EDAD_USUARIO, 
            placeholder:"Diga su edad", 
            id: "edad", 
            minimo: Usuario::EDAD_MINIMA, 
            maximo: Usuario::EDAD_MAXIMA, 
            error: "La edad debe estar comprendida entre 18 y 100"
        );

        $campoEstudios = new CampoSelect(
            label: "Estudios", 
            name: Usuario::ESTUDIOS_USUARIO, 
            placeholder: "Especifique sus estudios", 
            id: "estudios", 
            error: "Los estudios introducidos no son válidos"
        );

        $campoEstudios->crearSelect(
            label: "Informatica", 
            value: Estudios::INFORMATICA->value
        );

        $campoEstudios->crearSelect(
            label: "Electrónica", 
            value: Estudios::ELECTRONICA->value
        );

        $campoEstudios->crearSelect(
            label: "Matemáticas", 
            value: Estudios::MATEMATICAS->value
        );

        $campoIdiomas = new CampoCheckBox(
            label: "Idiomas", 
            name: Usuario::IDIOMAS_USUARIO, 
            error: "Debe seleccionar al menos un idioma"
        );

        $campoIdiomas->crearCheckbox(
            label: "Inglés", 
            value: Idioma::INGLES->value, 
            id: "ingles"
        );

        $campoIdiomas->crearCheckbox(
            label: "Español", 
            value: Idioma::ESPANOL->value, 
            id: "spanish"
        );

        $campoIdiomas->crearCheckbox(
            label: "Chino",
            value: Idioma::CHINO->value, 
            id: "chino"
        );

        $this->addCampo($campoUsuario);
        $this->addCampo($campoClave);
        $this->addCampo($campoSexo);
        $this->addCampo($campoEdad);
        $this->addCampo($campoEstudios);
        $this->addCampo($campoIdiomas);
    }

    public function crearObjeto(): Usuario|null {
        $usuario = null;

        if ($this->validarFormulario()) {
            $usuario = new Usuario(
                usuario: $this->peticion()[Usuario::NOMBRE_USUARIO],
                clave: $this->peticion()[Usuario::CLAVE_USUARIO],
                sexo: Sexo::from($this->peticion()[Usuario::SEXO_USUARIO]),
                edad: intval($this->peticion()[Usuario::EDAD_USUARIO]),
                estudios: Estudios::from($this->peticion()[Usuario::ESTUDIOS_USUARIO])
            );

            array_walk($this->peticion()[Usuario::IDIOMAS_USUARIO], function(string $idioma) use ($usuario) {
                $usuario->addIdioma(Idioma::from($idioma));
            });
        }
        return $usuario;
    }
}
?>
