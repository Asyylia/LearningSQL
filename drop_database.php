<?php

require_once 'config.php';

try {
    $dbname = 'AltAgendaDB';

    // REQUETE pour supprimer la base
    $sql = "DROP DATABASE IF EXISTS $dbname";
    $pdo->exec(statement: $sql);

    echo "Base de données '$dbname' supprimée (si elle existait).";
} catch (PDOException $e) {
    echo "Erreur lors de la suppression de la base: " . $e->getMessage();
}