CREATE DATABASE lol;

CREATE TABLE champ (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(46),
    rol VARCHAR(46),
    dificultad INT,
    descripcion VARCHAR(128)
);

INSERT INTO champ VALUES 
(1, "Daniel El Travieso", "Tanque", 5, "Nunca ha jugado al LOL, pero reparte hostias como panes"),
(2, "Andres Pitumba", "Luchador", 3, "Sus plantas medicinales aturden a sus enemigos"),
(3, "Laura Potter", "Mago", 4, "Lo mismo te hechiza que te programa una app"),
(4, "Luis Porro", "Support",2, "Siempre dispuesto a ayudar a los demás. Su archienemigo son las escaleras"),
(5, "Olga la Ponediez", "Support", 4, "Enseña a los demás. No la hagas cabrear");


CREATE TABLE `user`(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(64),
    username VARCHAR(64) UNIQUE,
    `password` VARCHAR(32) UNIQUE,
    email VARCHAR(64)
);
