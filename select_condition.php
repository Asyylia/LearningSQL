<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Requêtes conditionnelles</title>
</head>

<body>
    <h1>Requêtes avec conditions ( WHERE, LIKE, BETWEEN)</h1>
    <?php
    $sql = "SELECT * FROM users WHERE name LIKE 'M%' OR name LIKE 'E%'";
    echo "<p><strong>Requête executée: </strong> $sql</p>"; //système de debug
    
    $stmt = $pdo->query(query: $sql);

    echo "<table><tr><th>ID</th><th>Nom</th><th>Email</th><th>Date d'inscription</th></tr>";
    foreach ($stmt as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['created_at']}</td></tr>";
    }
    echo "</table>"
        ?>
</body>

</html>