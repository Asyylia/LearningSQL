-- Creation de la base de données si elle n'existe pas
-- CREATE DATABASE IF NOT EXISTS  "$AltAgendaDB" CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
-- USE AltAgendaDB;

    
    CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;
    

-- Création de la table des évènements
CREATE TABLE IF NOT EXISTS commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    produit VARCHAR(100) NOT NULL,
    quantite INT NOT NULL,
    prix DECIMAL (10,2) NOT NULL,
    date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insertion de données dans la table users
INSERT INTO users (name, email)
VALUES
('Morgane Mezza', 'mezza@gmail.com'),
('Eren Mezza', 'eren@gmail.com'),
('Steph Pozzi', 'pozzi@gmail.com');

-- Insertion de données dans la table commandes
INSERT INTO commandes (user_id, produit, quantite, prix)
VALUES
(1, 'Ordinateur portable', 1, 950.00),
(1, 'Clé USB 64GO', 3, 12.50),
(2, 'Écran 27"', 1, 210.00),
(3, 'Casque audio', 1, 75.00),
(2, 'Souris gamer', 2, 45.00);
