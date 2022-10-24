<?php

class UsuarioAdmin extends Usuario {

    public function __construct(string $apellidos = "", string $deporte = "") {
        parent::__construct("admin", $apellidos, $deporte);
    }

    public function setNombre(string $nombre): Usuario {
        $this->nombre = $nombre." (Admin)";
        return $this;
    }

    public function crearPartido() {
        echo "$this->nombre crea un partido";
    }

}

?>