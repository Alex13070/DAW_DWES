<?php

namespace ValidarUsuario;

use Exception;
use PlantillaFormulario\Campos\CampoCheckBox;
use PlantillaFormulario\Campos\CampoFecha;
use PlantillaFormulario\Campos\CampoNumber;
use PlantillaFormulario\Campos\CampoRadio;
use PlantillaFormulario\Campos\CampoSelect;
use PlantillaFormulario\Campos\CampoTexto;
use PlantillaFormulario\Formulario;
use PlantillaFormulario\Opciones\Opcion;
use PlantillaFormulario\Utilidades\Fecha;
use PlantillaFormulario\Utilidades\HttpMethod;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\RegexPhp;

class FormularioUsuario extends Formulario {    

    public function __construct() {
        parent::__construct(
            titulo: "Registro usuarios", 
            action: "index.php", 
            method: HttpMethod::POST
        );

        $campoUsuario = new CampoTexto (
            label: "Usuario", 
            name: Usuario::NOMBRE_NAME, 
            type: InputType::TEXT, 
            placeholder: "Usuario", 
            id: "usuario", 
            error: "El nombre de usuario no es correcto", 
            pattern: RegexPhp::NOMBRE
        );

        $campoClave = new CampoTexto (
            label: "Contraseña",
            name: Usuario::CLAVE_NAME, 
            type: InputType::PASSWORD, 
            placeholder: "Contraseña", 
            id: "password", 
            error: "La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula", 
            pattern: RegexPhp::CLAVE
        );

        $campoSexo = new CampoRadio(
            label: "Sexo", 
            name: Usuario::SEXO_NAME, 
            error: "Debes marcar al menos un sexo."
        );

        $campoSexo->addOpcion(
            new Opcion (
                label: "Hombre", 
                value: Sexo::HOMBRE->value, 
                id: "hombre"
            ),
            new Opcion (
                label: "Mujer", 
                value: Sexo::MUJER->value, 
                id: "mujer"
            ),
            new Opcion (
                label: "Otro", 
                value: Sexo::OTRO->value, 
                id: "otro"
            )
        );

        $campoEdad = new CampoNumber(
            label: "Edad", 
            name: Usuario::EDAD_NAME, 
            placeholder: "Diga su edad", 
            id: "edad", 
            minimo: Usuario::EDAD_MINIMA, 
            maximo: Usuario::EDAD_MAXIMA, 
            error: "La edad debe estar comprendida entre 18 y 100"
        );

        $campoFecha = new CampoFecha(
            label: "Fecha de contratación",
            name: Usuario::FECHA_CONTRATACION_NAME, 
            id: "birthdate", 
            error: "La fecha debe ser de estar entre " . Usuario::getFechaMinima()->toDDMMYYYY() . " y hoy",
            min: Usuario::getFechaMinima(), 
            max: Fecha::hoy()
        );

        $campoEstudios = new CampoSelect(
            label: "Estudios", 
            name: Usuario::ESTUDIOS_NAME, 
            placeholder: "Especifique sus estudios", 
            id: "estudios", 
            error: "Los estudios introducidos no son válidos"
        );

        $campoEstudios->addOpcion(
            new Opcion (
                label: "Informatica", 
                value: Estudios::INFORMATICA->value, 
                id: "informatica"
            ),
            new Opcion (
                label: "Electrónica", 
                value: Estudios::ELECTRONICA->value, 
                id: "electronica"
            ),
            new Opcion (
                label: "Matemáticas", 
                value: Estudios::MATEMATICAS->value, 
                id: "matematicas"
            )
        );

        $campoIdiomas = new CampoCheckBox(
            label: "Idiomas", 
            name: Usuario::IDIOMAS_NAME, 
            error: "Debe seleccionar al menos un idioma"
        );

        $campoIdiomas->addOpcion(
            new Opcion (
                label: "Inglés", 
                value: Idioma::INGLES->value, 
                id: "informatica"
            ),
            new Opcion (
                label: "Español", 
                value: Idioma::ESPANOL->value, 
                id: "espanol"
            ),
            new Opcion (
                label: "Chino", 
                value: Idioma::CHINO->value, 
                id: "chino"
            )
        );

        $this->addCampo($campoUsuario);
        $this->addCampo($campoClave);
        $this->addCampo($campoSexo);
        $this->addCampo($campoFecha);
        $this->addCampo($campoEdad);
        $this->addCampo($campoEstudios);
        $this->addCampo($campoIdiomas);
    }

    public function crearObjeto(): Usuario|null {
        $usuario = null;

        try {
            if ($this->validarFormulario()) {
                $usuario = new Usuario(
                    usuario: $this->peticion()[Usuario::NOMBRE_NAME],
                    clave: $this->peticion()[Usuario::CLAVE_NAME],
                    sexo: Sexo::from($this->peticion()[Usuario::SEXO_NAME]),
                    edad: intval($this->peticion()[Usuario::EDAD_NAME]),
                    estudios: Estudios::from($this->peticion()[Usuario::ESTUDIOS_NAME]),
                    fechaContratacion: Fecha::fromYYYYMMDD($this->peticion()[Usuario::FECHA_CONTRATACION_NAME], "-")
                );
    
                array_walk($this->peticion()[Usuario::IDIOMAS_NAME], function(string $idioma) use ($usuario) {
                    $usuario->addIdioma(Idioma::from($idioma));
                });
            }
        }
        catch(Exception $e) {
            // Redirigir a pagina de error ¿?
        }
        return $usuario;
    }
}
?>
