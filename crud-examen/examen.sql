DROP DATABASE IF EXISTS islantilla;
CREATE DATABASE islantilla;
USE islantilla;

CREATE TABLE IF NOT EXISTS reservas (
    id INT NOT NULL AUTO_INCREMENT,
    cliente VARCHAR(40) NOT NULL,
    entrada date NOT NULL,
    salida date NOT NULL,
    hab INT NOT NULL,
    pagado BOOLEAN NOT NULL,
    importe FLOAT NOT NULL,
    PRIMARY KEY (id)
);