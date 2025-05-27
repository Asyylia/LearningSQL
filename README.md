# Création de base de données SQL
- Configuration de config.php:
  
```<?php
$host = 'localhost';
$dbname = '';       
$username = 'root'; 
$password = '';     

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données :" . $e->getMessage());
}
?>
```

- Création de la DATABASE

```<?php

require_once 'config.php';

$db = 'AltAgendaDB';

try {
    
    $sql = "CREATE DATABASE IF NOT EXISTS  $db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
    $pdo->exec($sql);
    echo "Base de données '$db' créée (ou déjà existante).";
} catch (PDOException $e) {
    echo "Erreur lors de la création de la base de données" . $e->getMessage();
}
?>
```

Et grâce à la phrase :

```
$sql = "CREATE DATABASE IF NOT EXISTS  $db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
```

J'évite les erreurs si la base est déjà présente avec le morceau de code

```CREATE DATABASE IF NOT EXISTS  $db
```


J'indique l'encodage de ma page. "utf8mb4" est l'encodage recommandé pour supporter les émojis et caractères spéciaux.

```CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci```
