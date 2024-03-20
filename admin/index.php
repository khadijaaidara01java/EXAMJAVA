<?php
session_start();

// Connexion à la base de données (à adapter selon votre configuration)
require_once("base.php");

// Traitement de la connexion d'un étudiant
if(isset($_POST['index'])) {
    $email = $_POST['email'];
    $passwords = $_POST['passwords'];
    
    // Requête SQL pour obtenir le mot de passe de l'utilisateur
    $requete = $connexion->prepare("SELECT id_admins, passwords FROM admins WHERE email = ?");
    $requete->bind_param("s", $email);
    $requete->execute();
    $resultat = $requete->get_result();
    $administrateur = $resultat->fetch_assoc();
    
    // Vérification du mot de passe
    if ($administrateur && password_verify($passwords, $administrateur['passwords'])) {
        // Connexion réussie, enregistrement de l'ID de l'utilisateur en session par exemple
        // $_SESSION['etudiant_id'] = $utilisateur['id'];
        header("Location: accueil_admin.php");
        exit(); // Assurez-vous d'arrêter le script après la redirection
    } else {
        echo "Adresse e-mail ou mot de passe incorrect.";
    }
    
    
}

// Fermeture de la connexion à la base de données
$connexion->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion-Admin</title>
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>

<div class="container">
    <div class="form_area">
        <p class="title">Connexion Admin</p>
        <form action="index.php" method="post">
            <div class="form_group">
                <label class="sub_title" for="email">Email</label>
                <input placeholder="Enter your email" id="email" class="form_style" type="email" name="email">
            </div>
            <div class="form_group">
                <label class="sub_title" for="passwords">Password</label>
                <input placeholder="Votre password" id="password" class="form_style" type="password" name="passwords">
            </div>
            <div>
            <button class="btn" name="index">Se Connecter</button>
                <p>Pas De Compte ? <a class="link" href="inscription.php">S'inscrire !</a></p>
        
        
    </form>

</form>
</body>
</html>