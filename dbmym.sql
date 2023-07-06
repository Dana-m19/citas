
  CREATE DATABASE mym_asesores;

USE mym_asesores;

CREATE TABLE cliente (
    id INT(10) PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    edad INT(3) NOT NULL,
    telefono INT(10) NOT NULL,
    direccion VARCHAR(30) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
