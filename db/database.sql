CREATE DATABASE gameCode;

USE gameCode;

CREATE TABLE users(
    id INT NOT NULL,
    firstname VARCHAR(120) NOT NULL,
    lastname VARCHAR(120) NOT NULL,
    username VARCHAR(150) NOT NULL,
    password VARCHAR(60) NOT NULL,
    photo VARCHAR(255) NOT NULL
);

ALTER TABLE users
    MODIFY id INT NOT NULL AUTO_INCREMENT,
    ADD PRIMARY KEY(id);

-- Examples and test data
INSERT INTO users(firstname, lastname, username, password, photo) 
    VALUES ("Brandon", "Alexis", "lox", "lox12345", "foto.jgp");

INSERT INTO users(firstname, lastname, username, password, photo) 
    VALUES ("Juan", "Gomez", "jugo", "1475", "foto4.jgp");

