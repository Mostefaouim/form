CREATE DATABASE pers_info;
USE pers_info;

CREATE TABLE IF NOT EXISTS persone (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    civilite VARCHAR(20),
    adresse VARCHAR(50),
    code_postal INT(5),
    localite VARCHAR(13),
    pays VARCHAR(10),
    plateformes VARCHAR(17),
    applications VARCHAR(19),
    D_N DATE,
    D_R DATE,
    image BLOB,
    image2 BLOB
);
