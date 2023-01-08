<?php

namespace ut4\ValidarUsuario\src\util;

interface LeerEscribirCSV {
    public static function fromCSV(string $linea) : mixed;
    public function toCSV() : string;
}