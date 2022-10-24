<?php

class UsuarioPremium extends Usuario {
    public const CANTIDAD_VICTORIAS = 3;

    public function __construct(string $nombre = "", string $apellidos = "", string $deporte = "") {
        parent::__construct($nombre, $apellidos, $deporte);
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre." (Premium)";
        echo "Uso funcion hijo $this->nombre<br>";
        return $this;
    }

    ? ? ? ? ? ? ? Hay que preguntar por que esto no funciona si no reescribo esto
    
    /**
     * Get the value of nombre
     */ 
    public function getNombre(): string {
        return $this->nombre;
    }

}

?>