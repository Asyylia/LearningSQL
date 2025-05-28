<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fonctions SQL</title>
</head>

<body>
    <h1>Fonctions SQL (COUNT, AVG, SUM)</h1>
    <?php

    // fabrication de la requete SQL
    $sql = "SELECT 
COUNT(*) AS total_commandes, 
AVG(prix) AS moyenne, 
SUM(prix) AS total
FROM commandes";

    // systeme de debug
    echo "<p><strong>Requête exécutée : </strong> $sql</p>";

    //execute la requete et récupère les données avec un fetch
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch();

    echo "<ul>
<li><strong>Total de commandes : </strong> {$row['total_commandes']}</li>
<li><strong>Moyennes de montants : </strong> {$row['moyenne']} €</li>
<li><strong>Somme totale : </strong> {$row['total']} €</li>
</ul>";
    ?>

</body>

</html>