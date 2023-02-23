<?php


class AccesoADatos
{

    /* Defining the database connection parameters. */
    private const HOST = "localhost:3306";
    private const DB_NAME = "recuerdame";
    private const USUARIO = "root";
    private const CLAVE = "123abc";

    private PDO $conn;

    private static AccesoADatos $accesoADatos;

    private function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME,
                self::USUARIO,
                self::CLAVE
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $this->mostrarError("Error al conectar con la base de datos", $e);
        }
    }

    public static function getSingletone(): AccesoADatos
    {
        if (!isset(self::$accesoADatos)) {
            self::$accesoADatos = new AccesoADatos();
        }
        return self::$accesoADatos;
    }

    public function buscarUsuario(string $correo): array {
        $retorno = [];

        try {
            $statement = $this->conn->prepare("SELECT * FROM usuario WHERE correo = :correo");
            $statement->execute(
                array(
                    ":correo" => $correo
                )
            );

            $resultado = $statement->fetchAll();

            if (count($resultado) > 0) {
                $retorno = $resultado[0];
            }
        } catch (Exception $e) {
            $this->mostrarError("Error al conectar con la base de datos", $e);
        }

        return $retorno;
    }

    public function existeUsuario(string $correo): bool {
        return !empty($this->buscarUsuario($correo));
    }

    public function insertarUsuario(string $correo, string $clave, string $imagen): bool {
        $retorno = false;
        if (!$this->existeUsuario($correo)) {
            try {

                $statementUsuario = $this->conn->prepare(
                    "INSERT INTO usuario(correo, clave, imagen) VALUES (:correo, :clave, :imagen)"
                );

                $retorno = $statementUsuario->execute(
                    array(
                        ":correo" => $correo,
                        ":clave" => $clave,
                        ":imagen" => $imagen
                    )
                );
            } catch (Exception $e) {
                $this->mostrarError("Error al conectar con la base de datos", $e);
            }
        }

        return $retorno;
    }

    public function registrarToken(string $usuario, string $token): bool {
        $retorno = false;
        if ($this->existeUsuario($usuario)) {
            try {

                $statementToken = $this->conn->prepare(
                    "INSERT INTO tokens(usuario, token) VALUES (:usuario, :token)"
                );

                $retorno = $statementToken->execute(
                    array(
                        ":usuario" => $usuario,
                        ":token" => $token
                    )
                );
            } catch (Exception $e) {
                $this->mostrarError("Error al conectar con la base de datos", $e);
            }
        }

        return $retorno;
    }

    public function borrarToken(string $usuario): bool {
        $retorno = false;
        if ($this->existeUsuario($usuario)) {
            try {
                
                $statementToken = $this->conn->prepare(
                    "DELETE FROM tokens WHERE usuario = :usuario"
                );

                $retorno = $statementToken->execute(
                    array(
                        ":usuario" => $usuario
                    )
                );
            } catch (Exception $e) {
                $this->mostrarError("Error al conectar con la base de datos", $e);
            }
        }

        return $retorno;
    }

    public function buscarTokenDeUsuario(string $usuario): array {
        $retorno = [];
        if ($this->existeUsuario($usuario)) {
            try {

                $statementToken = $this->conn->prepare(
                    "SELECT * FROM tokens WHERE usuario = :usuario"
                );

                $statementToken->execute(
                    array(
                        ":usuario" => $usuario
                    )
                );

                $resultados = $statementToken->fetchAll();

                if (count($resultados) > 0) {
                    $retorno = $resultados[0];
                }
            } catch (Exception $e) {
                $this->mostrarError("Error al conectar con la base de datos", $e);
            }
        }

        return $retorno;
    }


    public function buscarToken(string $token): array {
        $retorno = [];
        try {

            $statementToken = $this->conn->prepare(
                "SELECT * FROM tokens WHERE token = :token"
            );

            $statementToken->execute(
                array(
                    ":token" => $token
                )
            );

            $resultados = $statementToken->fetchAll();

            if (count($resultados) > 0) {
                $retorno = $resultados[0];
            }
        } catch (Exception $e) {
            $this->mostrarError("Error al conectar con la base de datos", $e);
        }
        return $retorno;
    }

    private function mostrarError(string $mensaje, \Throwable $error) {
        echo "<h1>$mensaje</h1>";
        echo ("<pre>");
        print_r($error);
        echo ("</pre>");
        die();
    }
}
