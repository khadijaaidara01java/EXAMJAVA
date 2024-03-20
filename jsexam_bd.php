<?php
// Paramètres de connexion à la base de données
$serveur = "mysql-javaexam.alwaysdata.net";
$utilisateur = "javaexam";
$mot_de_passe = "assane01";
$base_de_donnees = "javaexam_bd";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}
?>
