DROP DATABASE IF EXISTS blog;

CREATE DATABASE IF NOT EXISTS blog;

USE blog;

CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT,
    usuario VARCHAR(255), 
    clave VARCHAR(255), 
    nombre VARCHAR(255),
    apellido VARCHAR(255),

    PRIMARY KEY (id)    
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS post (
    id INT AUTO_INCREMENT, 
    titulo VARCHAR(255),
    cuerpo VARCHAR(255),
    fecha date, 

    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS usuario_post (
    id_usuario INT, 
    id_post INT, 
    
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_post) REFERENCES post(id),
    PRIMARY KEY (id_usuario, id_post)
);


