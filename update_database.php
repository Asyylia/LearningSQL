<?php

require_once 'config.php';

try {

    $newName = "Asy";
    $userID = 1;

    $stmt = $pdo->prepare(query: "UPDATE users SET name = :name WHERE id = :id");
    $stmt->execute(params: [
        ':name' => $newName,
        ':id' => $userID
    ]);

    if ($stmt->rowCount()) {
        echo "Utilisateur #$userID mis à jour avec succès : nouvelle valeur = $newName";
    } else {
        echo "Aucun changement effectué. (ID inexistant ou même valeur";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la mise à jour :" . $e->getMessage();
}
