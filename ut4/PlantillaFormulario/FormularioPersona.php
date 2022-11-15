<?

namespace PlantillaFormulario;

use PlantillaFormulario\Campos\CampoCheckBox;
use PlantillaFormulario\Campos\CampoNumber;
use PlantillaFormulario\Campos\CampoRadio;
use PlantillaFormulario\Campos\CampoSelect;
use PlantillaFormulario\Campos\CampoTexto;
use PlantillaFormulario\Utilidades\HttpMethod;
use PlantillaFormulario\Utilidades\InputType;
use PlantillaFormulario\Utilidades\RegexPhp;

class FormularioPersona extends Formulario {

    public function __construct() {
        parent::__construct("Prueba formulario", "index.php", HttpMethod::GET);

        $campoUsuario = new CampoTexto("Usuario", "usuario", InputType::TEXT, "Usuario", "usuario", "El nombre de usuario no es correcto", RegexPhp::NOMBRE);
        $campoClave = new CampoTexto("Contraseña", "password", InputType::PASSWORD, "Contraseña", "password", "La clave debe de tener *sample text*", RegexPhp::NOMBRE);

        $campoSexo = new CampoRadio("Sexo", "sexo", "Debes marcar al menos un sexo.");
        $campoSexo->crearRadio("Hombre", "H", "hombre");
        $campoSexo->crearRadio("Mujer", "M", "mujer");
        $campoSexo->crearRadio("Otro", "O", "otro");


        $campoEdad = new CampoNumber("Edad", "edad", "Diga su edad", "edad", 18, 100, "La edad debe estar comprendida entre 18 y 100");

        $campoEstudios = new CampoSelect("Estudios", "estudios", "Especifique sus estudios", "estudios", "Los estudios introducidos no son válidos");
        $campoEstudios->crearSelect("Informatica", 1);
        $campoEstudios->crearSelect("Electrónica", 2);
        $campoEstudios->crearSelect("Matemáticas", 3);

        $campoIdiomas = new CampoCheckBox("Idiomas", "idiomas", "Debe seleccionar al menos un idioma");
        $campoIdiomas->crearCheckbox("Inglés", "I", "ingles");
        $campoIdiomas->crearCheckbox("Español", "E", "spanish");
        $campoIdiomas->crearCheckbox("Chino", "C", "chino");

        $this->addCampo($campoUsuario);
        $this->addCampo($campoClave);
        $this->addCampo($campoSexo);
        $this->addCampo($campoEdad);
        $this->addCampo($campoEstudios);
        $this->addCampo($campoIdiomas);
    }

    public function crearObjeto(): mixed {
        // $persona = "";

        // if ($this->validarFormulario()) {
        //     $persona = new Persona();
        //     //  meter todos los datos

        // }
        return "";
    }
}