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

CREATE TABLE games(
    id INT NOT NULL,
    name VARCHAR(90) NOT NULL,
    description VARCHAR(200) NOT NULL,
    id_user INT NOT NULL,
    created_at DATE NOT NULL
);

ALTER TABLE games
    MODIFY id INT NOT NULL AUTO_INCREMENT,
    ADD PRIMARY KEY(id),
    ADD FOREIGN KEY(id_user) REFERENCES users(id); 

-- Examples and test data
INSERT INTO users(firstname, lastname, username, password, photo) 
    VALUES ("Brandon", "Alexis", "lox", "lox12345", "foto.jgp");

INSERT INTO users(firstname, lastname, username, password, photo) 
    VALUES ("Juan", "Gomez", "jugo", "1475", "foto4.jgp");

