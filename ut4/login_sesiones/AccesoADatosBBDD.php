<?php

namespace ut4\login_sesiones;

use Exception;
use PDO;

class AccesoADatosBBDD {

/* Defining the database connection parameters. */
    private const HOST = "localhost:3306";
    private const DB_NAME = "usuario_login";
    private const USUARIO = "root";
    private const CLAVE = "123abc";

    private PDO $conn;
    
    private static AccesoADatosBBDD $accesoADatos;

    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME,
                self::USUARIO,
                self::CLAVE
            );
    
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "<h1>Error al conectar con la base de datos</h1>";
            echo $e->getMessage();
            die();
        }
    }

    public static function getSingletone() : AccesoADatosBBDD {
        if (!isset(self::$accesoADatos)) {
            self::$accesoADatos = new AccesoADatosBBDD ();
        }
        return self::$accesoADatos;
    }

    public function findUsuarioByEmail(string $email) : array{     
        $retorno = [];

        try {
            $statement = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");
            $statement->execute(
                array(
                    ":email" => $email
                )
            );

            $resultados = $statement->fetchAll();
            
            $retorno = !empty($resultados) ? $resultados[0] : [];
        }
        catch (Exception $e) {
            echo "<h1>Error al conectar con la base de datos</h1>";
            echo $e->getMessage();
            die();
        }

        return $retorno;
    }
    
}
