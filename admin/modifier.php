<?php
include 'base.php';

// Vérification de la soumission du formulaire pour la modification
if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $classe = $_POST['classe'];

    $sql = "UPDATE users SET nom='$nom', email='$email', classe='$classe' WHERE id=$id";

    if ($connexion->query($sql) === TRUE) {
        header("Location: liste_users.php?message=modifie");
        exit();
    } else {
        echo "Erreur lors de la modification de l'utilisateur: " . $connexion->error;
    }
}

// Vérification de la soumission du formulaire pour la suppression
if (isset($_POST['supprimer'])) {
    $id = $_POST['id_utilisateur'];

    $sql = "DELETE FROM users WHERE id=$id";

    if ($connexion->query($sql) === TRUE) {
        header("Location: liste_users.php?message=supprime");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'utilisateur: " . $connexion->error;
    }
}

// Récupération des informations de l'utilisateur à modifier ou supprimer
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $connexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <form method="post" action="">
            <input type="hidden" name="id_utilisateur" value="<?php echo $row['id']; ?>">
            Nom: <input type="text" name="nom" value="<?php echo $row['nom']; ?>"><br>
            Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
            Classe: <input type="text" name="classe" value="<?php echo $row['classe']; ?>"><br>
            <input type="submit" name="modifier" value="Modifier">
            <input type="submit" name="supprimer" value="Supprimer">
        </form>
<?php
    } else {
        echo "Utilisateur non trouvé";
    }
}

$connexion->close();
?>
