<?php 

// Crea un objeto Config que implemente el patrón Singleton

// Este objeto config puede almacenar la información del nombre de la aplicación.

// getNombre, setNombre
// Crea una página en la que accedas desde distintos puntos a ese objeto Singleton

// NOTA: Debes observar cómo es el mismo objeto.

class Config {

    private static Config $config;

    private string $nombreApp;

    public function getNombreApp() {
        return $this->nombreApp;
    }
    
    public function setNombreApp($nombreApp) {
        $this->nombreApp = $nombreApp;
        return $this;
    }
    
    private function __construct() {}

    public static function getSingletone() {

        if (!isset(self::$config)) {
            self::$config = new Config (); 
        } 

        return self::$config;
    }

}


?>
