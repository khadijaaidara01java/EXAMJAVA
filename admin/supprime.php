<?php
require_once 'base.php'; // Inclure le fichier de connexion à la base de données

// Vérifier si l'ID de l'utilisateur à supprimer est passé en paramètre dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer et exécuter la requête de suppression
    $sql = "DELETE FROM users WHERE id = $id";

    if ($connexion->query($sql) === TRUE) {
        header("Location: liste_users.php?=supprime");
    } else {
        header("Location: liste_users.php?=erreur");
    }
} else {
    echo "ID d'utilisateur non spécifié.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>
