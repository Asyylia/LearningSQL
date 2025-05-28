<?php
//Informations de connexion à la base de données
$host = 'localhost'; //endroit où est l'adresse IP de ton server MySQL
$dbname = 'AltAgendaDB';        //Nom de la base ( laisser vide pour seulement créer)
$username = 'root';  //utilisateur MySQL
$password = '';      // mot de passe MySQL

try {
    //connexion à mySQL sans spécifier de base pour permettre la création
    //Connexion a la bdd
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // pour afficher les erreurs en cas de problèmes
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données :" . $e->getMessage());
}
