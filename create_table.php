<?php

require_once 'config.php';


try {
    $table = 'users';

    // Création de la table "users"
    $sql = "
    CREATE TABLE IF NOT EXISTS $table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;
     ";

    $pdo->exec(statement: $sql);
    echo "Table $table créée avec succès ( ou déjà existante ).";
} catch (PDOException $e) {
    echo " Erreur lors de la création de la table : " . $e->getMessage();
}
// UNIQUE sur email pour éviter les doublons
// ENGINE=InnoDB pour supporter les contraintes (clé étrangeres si on ajoute des relations plus tard)