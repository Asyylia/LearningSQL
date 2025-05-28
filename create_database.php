<?php
//create_database.php

require_once 'config.php';

$message = "";
//est-ce que le formulaire est de type "POST" et que "POST" contient dbname
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dbname'])) {
    $createDB = preg_replace(pattern: '/[^a-zA-Z0-9_]/', replacement: '', subject: $_POST['dbname']); //nettoyage
}
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une base de données</title>
</head>

<body>
    <h1>Créer une base de données</h1>

    <form method="post" action="">
        <label for="dbname">Nom de la base:</label>
        <input type="text" id="dbname" name="dbname" required>
        <input type="submit" value="créer la base de données">
    </form>

    <!-- systeme pour prevenir du double click sur le bouton -->
    <?php if (!empty($message)): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>

</body>

</html>