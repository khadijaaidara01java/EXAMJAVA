

<?php
// Inclure le fichier de connexion à la base de données
require_once("../jsexam_bd.php");

// Vérification de la soumission du formulaire de connexion
if(isset($_POST['connexion_joueur'])) {
    $email = $_POST['email'];
    $passwords = $_POST['passwords'];
    
    // Requête SQL pour obtenir les informations de l'utilisateur
    $requete = $connexion->prepare("SELECT id, passwords FROM users WHERE email = ?");
    $requete->bind_param("s", $email);
    $requete->execute();
    $resultat = $requete->get_result();
    $utilisateur = $resultat->fetch_assoc();
    
    // Vérification du mot de passe
    if ($utilisateur && password_verify($passwords, $utilisateur['passwords'])) {
        // Connexion réussie, enregistrement de l'ID de l'utilisateur en session par exemple
        session_start();
        $_SESSION['user_id'] = $utilisateur['id'];
        // Rediriger l'utilisateur vers la page souhaitée après la connexion
        header("Location: ../jouer.php");
        exit(); // Assurez-vous d'arrêter le script après la redirection
    } else {
        // Identifiants incorrects, afficher un message d'erreur
        echo "Adresse e-mail ou mot de passe incorrect.";
    }
    
    // Fermeture de la requête
    $requete->close();
}

// Fermeture de la connexion à la base de données
$connexion->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion-user</title>
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>

<div class="container">
    <div class="form_area">
        <p class="title">Connexion joueur</p>
        <form action="" method="post">
            <div class="form_group">
                <label class="sub_title" for="email">Email</label>
                <input placeholder="Enter your email" id="email" class="form_style" type="email" name="email">
            </div>
            <div class="form_group">
                <label class="sub_title" for="passwords">Password</label>
                <input placeholder="Votre password" id="password" class="form_style" type="password" name="passwords">
            </div>
            <div>
            <button class="btn" name="connexion_joueur">Se Connecter</button>
                <p>Pas De Compte ? <a class="link" href="inscription_joueur.php">S'inscrire !</a></p>
        
    </form>
</form>
</body>
</html>