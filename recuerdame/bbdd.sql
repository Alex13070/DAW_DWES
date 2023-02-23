CREATE DATABASE recuerdame;

USE recuerdame;

CREATE TABLE usuario (
    correo VARCHAR(255) PRIMARY KEY,
    clave VARCHAR(255),
    imagen VARCHAR(255)
)

CREATE TABLE tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255),
    token VARCHAR(255),
    FOREIGN KEY (usuario) REFERENCES usuario(correo)
)