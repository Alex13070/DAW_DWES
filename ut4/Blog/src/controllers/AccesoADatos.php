<?php 

namespace ut4\Blog\src\controllers;

use Exception;
use PDO;
use ut4\Blog\src\model\Post;
use ut4\Blog\src\model\Usuario;

class AccesoADatos {

/* Defining the database connection parameters. */
    private const HOST = "localhost:3306";
    private const DB_NAME = "blog";
    private const USUARIO = "root";
    private const CLAVE = "123abc";

    private const CHARSET = "utf8mb4";

    private PDO $conn;
    
    private static AccesoADatos $accesoADatos;

    public static function getSingletone() : AccesoADatos {
        if (!isset(self::$accesoADatos)) {
            self::$accesoADatos = new AccesoADatos();
        }
        return self::$accesoADatos;
    }

    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME . ";charset=" . self::CHARSET,
                self::USUARIO,
                self::CLAVE
            );
    
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $this->mostrarError("Error al conectar con la base de datos.", $e);
        }
    }


    public function existeUsuario(string $correo) : bool{     
        $retorno = false;

        try {
            $statement = $this->conn->prepare("SELECT * FROM usuario WHERE correo = :correo");
            $statement->execute(
                array(
                    ":correo" => $correo
                )
            );

            $resultados = $statement->fetchAll();

            $retorno = !empty($resultados);
        }
        catch (Exception $e) {
            $this->mostrarError("Error al comprobar si exite el usuario", $e);
        }

        return $retorno;
    }

    public function insertarUsuario(Usuario $usuario) : bool {
        $exito = false;

        if (!$this->existeUsuario($usuario->getCorreo())) {
            try {
                $stmt = $this->conn->prepare("INSERT INTO usuario(correo, clave, nombre, apellido)
                    VALUES (:correo, :clave, :nombre, :apellido)"
                );

                $exito = $stmt->execute(
                    array(
                        ":correo" => $usuario->getCorreo(),
                        ":clave" => $usuario->getClave(),
                        ":nombre" => $usuario->getNombre(),
                        ":apellido" => $usuario->getApellidos()
                    )
                );
            }
            catch (Exception $e) {
                $this->mostrarError("Error al crear usuario", $e);
            }
        }
        // else y algun log ¿?

        return $exito;

    }

    public function buscarUsuario(string $correo) : array {
        $usuario = [];
        
        try {
            $stmt = $this->conn->prepare("SELECT id, correo, clave FROM usuario WHERE correo = :correo");

            $stmt->execute(
                array(
                    ":correo" => $correo
                )
            );

            $resultado = $stmt->fetchAll();

            if (count($resultado) > 0) {
                $usuario = $resultado[0];
            }

            

        }
        catch (Exception $e) {
            $this->mostrarError("Error al buscar usuario", $e);
        }

        return $usuario;
    }

    /**
     * Crea post y devuelve su id
     * @param Post $post post a guardar
     * @return int id del post guardado. -1 para errores.
     */
    public function crearPost(Post $post) : int{
        $id_post = -1;
        try {
            $this->conn->beginTransaction();

            $stmt = $this->conn->prepare("INSERT INTO post(titulo, cuerpo, fecha) VALUES (:titulo, :cuerpo, :fecha)");

            $stmt->execute(
                array(
                    ':titulo' => $post->getTitulo(),
                    ':cuerpo' => $post->getCuerpo(),
                    ':fecha' => $post->getFecha(),
                )
            );

            $id_post = $this->conn->lastInsertId();

            $stmt2 = $this->conn->prepare("INSERT INTO usuario_post(id_usuario, id_post) VALUES (:id_usuario, :id_post)");

            $stmt2->execute(
                array(
                    ':id_usuario' => $_SESSION["id"],
                    ':id_post' => $id_post
                )
            );

            $this->conn->commit();

        } catch (\Throwable $e) {
            $id_post = -1;
            $this->conn->rollBack();
            $this->mostrarError("Error al crear usuario", $e);
        } 

        return $id_post;
    }

    public function findPostById(string $id) : array {
        $post = [];

        try {

            $stmt = $this->conn->prepare("
                SELECT post.id as id, post.titulo as titulo, post.cuerpo as cuerpo, post.fecha as fecha, usuario.correo as correo 
                    FROM post, usuario, usuario_post 
                    WHERE usuario.id = usuario_post.id_usuario
                    AND usuario_post.id_post = post.id
                    AND post.id = :id
            ");

            $stmt->execute(
                array(
                    ':id' => $id
                )
            );

            $resultado = $stmt->fetchAll();

            if (count($resultado) > 0) {
                $post = $resultado[0];
            }

        } catch (\Throwable $e) {
            $this->mostrarError("Error al buscar post.", $e);
        } 

        return $post;
    }

    public function findAllPosts() : array {
        $post = [];

        try {

            $stmt = $this->conn->prepare("
                SELECT post.id as id, post.titulo as titulo, post.cuerpo as cuerpo, post.fecha as fecha, usuario.correo as correo 
                    FROM post, usuario, usuario_post 
                    WHERE usuario.id = usuario_post.id_usuario
                    AND usuario_post.id_post = post.id
            ");

            $stmt->execute();

            $post = $stmt->fetchAll();

        } catch (\Throwable $e) {
            $this->mostrarError("Error al buscar post.", $e);
        } 

        return $post;
    }

    public function findAllPostsByCorreo(string $idUsusario) : array {
        $post = [];

        try {

            $stmt = $this->conn->prepare("
                SELECT post.id as id, post.titulo as titulo, post.cuerpo as cuerpo, post.fecha as fecha, usuario.correo as correo 
                    FROM post, usuario, usuario_post 
                    WHERE usuario_post.id_post = post.id
                    AND usuario_post.id_usuario = usuario.id
                    AND usuario.id = :id;
            ");

            $stmt->execute(
                array(
                    ':id' => $idUsusario
                )
            );

            $post = $stmt->fetchAll();

        } catch (\Throwable $e) {
            $this->mostrarError("Error al buscar post.", $e);
        } 

        return $post;
    }


    private function mostrarError(string $mensaje, \Throwable $error) {
        echo "<h1>$mensaje</h1>";
        echo ("<pre>");
        print_r($error);
        echo ("</pre>");
        die();
    }
    
}

?>