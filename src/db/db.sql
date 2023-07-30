CREATE DATABASE sistemadb;

USE sistemadb;

CREATE TABLE usuarios(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20),
    email VARCHAR(20),
    password VARCHAR(100)
);