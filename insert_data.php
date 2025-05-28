<?php

require_once 'config.php';

try {

    //Données à insérer
    $name = "Eren Mezz";
    $email = "eren@gmail.com";

    //Requête préparée ( sécurité contre les injections SQL)
    $stmt = $pdo->prepare(query: "INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->execute(params: [
        ':name' => $name,
        ':email' => $email,
    ]);
    echo " Utilisateur inséré avec succès : $name - $email";
} catch (PDOException $e) {
    echo " Erreur lors de l'insertion des données : " . $e->getMessage();
}

//On utilise une requête préparée (prepare + execute) pour éviter les failles d'injection sQL
?>