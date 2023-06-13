DROP DATABASE IF EXISTS discosLuis;
CREATE DATABASE discosLuis;
USE discosLuis;
CREATE TABLE Artistas (
    idArtista INTEGER NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    pais CHAR(3) NOT NULL,
    PRIMARY KEY (idArtista),
    INDEX artistas_nombre(nombre)
);
CREATE TABLE Generos (
    idGenero INTEGER NOT NULL AUTO_INCREMENT,
    genero VARCHAR(45) NOT NULL,
    PRIMARY KEY (idGenero),
    INDEX generos_genero(genero)
);
CREATE TABLE Discos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(45) NOT NULL,
    idArtista INTEGER NOT NULL,
    idGenero INTEGER NOT NULL,
    cassette BOOLEAN NOT NULL DEFAULT 0,
    lanzamiento DATE NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idArtista) REFERENCES Artistas(idArtista),
    FOREIGN KEY (idGenero) REFERENCES Generos(idGenero),
    INDEX discos_titulo(titulo),
    UNIQUE KEY (titulo)
);
INSERT INTO Artistas (nombre, pais)
VALUES ("Mike Oldfield", "GBR"),
    ("Dire Straits", "GBR"),
    ("Extremoduro", "ESP");
INSERT INTO Generos (genero)
VALUES ("New Age"),
    ("Rock");
INSERT INTO Discos (
        titulo,
        idArtista,
        idGenero,
        cassette,
        lanzamiento
    )
VALUES ("Tubular Bells", 1, 1, 0, "1973-05-25"),
    ("Tubular Bells 2", 1, 1, 0, "1992-08-31"),
    ("Brothers in Arms", 2, 2, 0, "1985-05-13"),
    ("Deltoya", 3, 2, 0, "1992-06-12");