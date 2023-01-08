<?php 

namespace ut4\PlantillaFormulario\Utilidades;

enum InputType : string {
    case DATE = "date";
    case TEXT = "text";
    case EMAIL = "email";
    case HIDDEN = "hidden";
    case NUMBER = "number";
    case PASSWORD = "password";
    case RADIO_BUTTON = "radio";
    case SELECT = "select";
    case CHECKBOX = "checkbox";
}


?>