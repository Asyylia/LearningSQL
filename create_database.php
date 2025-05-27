<?php
//create_database.php

require_once 'config.php';
require_once 'form_create_database.php';


try {
    //requete SQL pour créer la base "test_db" si elle n'existe pas
    $sql = "CREATE DATABASE IF NOT EXISTS  $createdDB CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
    $pdo->exec($sql);
    echo "Base de données '$createdDB' créée (ou déjà existante).";
} catch (PDOException $e) {
    echo "Erreur lors de la création de la base de données" . $e->getMessage();
}
//utf8mb4 est l'encodage recommandée ojd pour supporter les émojis et caractères speciaux
// CREATE DATABASE IF NOT EXISTS évite les erreurs si la base est déjà présente
?>