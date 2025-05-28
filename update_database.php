<?php

require_once 'config.php';

try {
    //nouveau paramètres
    $newName = "Asy";
    $userID = 1; //ID de l'utilisateur à modifier

    //requete update
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

//rowncount() permet de vériier si un changement a vraiment été effecgtué
