<?php

namespace PlantillaFormulario\Utilidades;

enum RegexPhp : string {

    /**
     * Expresion regular que permite letras, mayusculas, minusculas, numeros, acentos y caracteres especiales
     */
    case NOMBRE = '/^[a-zA-Z0-9À-ÖØ-öø-ÿ\s\/._-]{1,}$/';

    /**
     * Valida numeros y puedes poner si son negativos   
     */
    case NUMERO = '/^[-]?\d{1,}$/';
    
    /**
     * Expresion regular que pide 9 digitos
     */
    case TELEFONO = '/^\d{9}$/';

    /**
     * Valida correos del formato "xxx@xxx.xxx" pudiendo meter letras, numeros, puntos, guiones y barras bajas
     */
    case CORREO = '/^[a-zA-Z0-9.!#$%&\'*+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/';

    /**
     * La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
     */
    case CLAVE = '/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/';
    
}