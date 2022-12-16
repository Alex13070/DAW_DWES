<?php 

namespace ej3;

use Exception;
use PDO;

class AccesoADatosExamen {

    /* Defining the database connection parameters. */
    private const HOST = "localhost:3306";
    private const DB_NAME = "examen_php";
    private const USUARIO = "root";
    private const CLAVE = "123abc";

    private PDO $conn;
    
    private static AccesoADatosExamen $accesoADatos;

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

    public static function getSingletone() : AccesoADatosExamen {
        if (!isset(self::$accesoADatos)) {
            self::$accesoADatos = new AccesoADatosExamen ();
        }
        return self::$accesoADatos;
    }

    public function insertLog(string $navegador, int $timestamp) : bool{     
        $retorno = false;

        try {
            $statement = $this->conn->prepare("INSERT INTO Logs(navegador,timestamp) VALUES (:navegador, :timestamp)");
            $retorno = $statement->execute(
                array(
                    ":navegador" => $navegador,
                    ":timestamp" => $timestamp
                )
            );
        }
        catch (Exception $e) {
            echo "<h1>Error al guardar datos</h1>";
            echo $e->getMessage();
            die();
        }

        return $retorno;
    }

    public function findAllLogs() {
        $retorno = [];

        try {
            $statement = $this->conn->prepare("SELECT * FROM Logs");
            if($statement->execute()) {
                $retorno = $statement->fetchAll();
            }
        }
        catch (Exception $e) {
            echo "<h1>Error al sacar datos</h1>";
            echo $e->getMessage();
            die();
        }

        return $retorno;
    }

    
}

