<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Trier par</title>
</head>

<body>
    <h1>GROUP BY / ORDER BY / HAVING</h1>
    <p>
        Exemple d'utilisation : trier les données utilisateurs par nombre de commandes et prix total des commandes
    </p>


    <?php
    $sql = "
 SELECT u.name,
 COUNT(c.id) AS nb_commandes,
 SUM(c.prix) AS total
 FROM users u
 JOIN commandes c ON u.id = c.id
 GROUP BY u.name
 HAVING total >100
 ORDER BY total DESC
 ";
    echo "<p><strong>Requête éxécutée :</strong>$sql</p>";

    $stmt = $pdo->query($sql);

    echo "<table><tr><th>Nom</th><th>Commandes</th><th>Total €</th></tr>";

    foreach ($stmt as $row) {
        echo "<tr><td>{$row['name']}</td><td>{$row['nb_commandes']}</td><td>{$row['total']}</td></tr>";
    }
    echo "</table>"
        ?>
</body>

</html>