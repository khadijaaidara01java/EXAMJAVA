<?php
// Début de la session
session_start();

// Destruction de toutes les données de la session
session_destroy();

// Redirection vers la page de connexion
header("Location: ../index.php");
exit(); // Assurez-vous d'arrêter le script après la redirection
?>
