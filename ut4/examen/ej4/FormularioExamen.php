<?php

namespace examen\ej4;

use ut4\PlantillaFormulario\Campos\CampoCheckBox;
use ut4\PlantillaFormulario\Campos\CampoTexto;
use ut4\PlantillaFormulario\Formulario;
use ut4\PlantillaFormulario\Opciones\Opcion;
use ut4\PlantillaFormulario\Utilidades\HttpMethod;
use ut4\PlantillaFormulario\Utilidades\InputType;
use ut4\PlantillaFormulario\Utilidades\RegexPhp;

class FormularioExamen extends Formulario {
    
	
    public function __construct()
    {
        parent::__construct(
            titulo: "Pedido de quesos", 
            action: "index.php", 
            method: HttpMethod::POST
        );

        $campoNombre = new CampoTexto (
            label: "Nombre del queso", 
            name: "nombre", 
            type: InputType::TEXT, 
            placeholder: "Nombre del queso", 
            id: "nombre", 
            error: "Debes rellenar este campo", 
            pattern: RegexPhp::NOMBRE
        );

        $campoDireccion = new CampoTexto (
            label: "Direccion de envio", 
            name: "direccion", 
            type: InputType::TEXT, 
            placeholder: "Direccion de envio", 
            id: "direccion", 
            error: "Debes rellenar este campo", 
            pattern: RegexPhp::NOMBRE
        );

        $extras = new CampoCheckBox(
            label: "Extras",
            name: "extra", 
            error: "Debes seleccionar al menos un campo"
        );

        $extras->addOpcion(
            new Opcion(
                label: "Caja de madera",
                value: "caja",
                id: "caja"
            ),
            new Opcion(
                label: "Tarjeta de regalo",
                value: "tarjeta",
                id: "tarjeta"
            ),
            new Opcion(
                label: "Envío urgente",
                value: "urgente",
                id: "urgente"
            ),
            new Opcion(
                label: "Panecillos",
                value: "panecillos",
                id: "panecillos"
            )
        );

        $this->addCampo($campoNombre);
        $this->addCampo($campoDireccion);
        $this->addCampo($extras);
    }
	public function crearObjeto(): mixed {
        return "No hago nada";
	}
}