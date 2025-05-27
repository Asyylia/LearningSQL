<?php

require_once 'config.php';

try {

    $userIdToDelete = 1; // ID A SUPPRIMER

    //REQUETE DELETE
    $stmt = $pdo->prepare(query: "DELETE FROM users WHERE id = :id");
    $stmt->execute(params: [':id' => $userIdToDelete]);

    if ($stmt->rowCount()) {
        echo "Utilisateur #$userIdToDelete supprimé avec succès.";
    } else {
        echo "Aucun utilisateur trouvé avec l'ID $userIdToDelete.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la suppression: " . $e->getMessage();
}

//comment détecter si la suppression a eu lieu = (rowCount())