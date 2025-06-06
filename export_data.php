<?php
require_once 'config.php';

//déclare le type de contenu dans le header ( obligatoire pour que l'utilisateur telecharge quelque chose, qui va s'envoyer dans la barre telechargements du navigateur)
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=commandes_export.csv');

//on ouvre le fichier à telecharger en mode écriture "w"
$output = fopen("php://output", "w");
//on ajoute le nom des colonnes dans notre fichier
fputcsv($output, ['ID', 'Utilisateur', 'Montant', 'Date']);

$sql = "SELECT c.id, u.name, c.prix, c.date_commande
FROM commandes c JOIN users u ON c.user_id = u.id";

//on parcours le résultat de la requete et on remplit le fichier "csv"
$stmt = $pdo->query($sql);
while ($row = $stmt->fetch()) {
    fputcsv($output, $row);
}

//on sauvegarde le fichier
fclose($output);
exit;
?>