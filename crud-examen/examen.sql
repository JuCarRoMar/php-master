DROP DATABASE IF EXISTS islantilla;
CREATE DATABASE islantilla;
USE islantilla;
CREATE TABLE reservas (
    id INT NOT NULL AUTO_INCREMENT,
    cliente VARCHAR(50) NOT NULL,
    entrada DATE NOT NULL,
    salida DATE NOT NULL,
    hab INT(3) NOT NULL,
    pagado BOOLEAN NOT NULL DEFAULT 0,
    importe FLOAT NOT NULL,
    PRIMARY KEY (id)
);