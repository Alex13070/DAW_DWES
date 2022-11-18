<?php

namespace ValidarUsuario;

interface LeerEscribirCSV {
    public static function fromCSV(string $linea) : mixed;
    public function toCSV() : string;
}