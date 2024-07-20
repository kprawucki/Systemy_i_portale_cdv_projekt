CREATE DATABASE password_manager;

USE password_manager;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('kacper', 'placki888');

CREATE TABLE passwords (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO passwords (service_name, username, password) VALUES 
('facebook', 'kacper', 'placki888'),
('github', 'kacper', 'placki888'),
('azure', 'Kacper', 'placki888');
