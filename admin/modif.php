<?php
// Inclure le fichier de connexion à la base de données
require_once 'base.php';

// Vérifier si le formulaire de modification a été soumis
if(isset($_POST['modif'])) {
    // Récupérer les données du formulaire
    $id_question = $_POST['id_question'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $selectQuestion = $_POST['selectQuestion'];

    // Préparer la requête SQL de mise à jour
    $sql = "UPDATE question SET question1=?, question2=?, question3=?, selectQuestion=? WHERE id_question=?";

    // Préparer la déclaration SQL
    $stmt = $connexion->prepare($sql);

    // Lier les paramètres
    $stmt->bind_param("ssssi", $question1, $question2, $question3, $selectQuestion, $id_question);

    // Exécuter la requête
    if($stmt->execute()) {
        echo "Question mise à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de la question: " . $connexion->error;
    }

    // Fermer la déclaration et la connexion
    $stmt->close();
    // $connexion->close();
}

// Sélectionner toutes les questions existantes dans la base de données
$sql = "SELECT * FROM question";
$result = $connexion->query($sql);

if ($result->num_rows > 0) {
    // Afficher le formulaire pour chaque question
    while($row = $result->fetch_assoc()) {
        ?>
        <form method="post" action="modif.php">
            <input type="hidden" name="id_question" value="<?php echo $row['id_question']; ?>">
            <label for="question1">Question 1:</label>
            <input type="text" name="question1" value="<?php echo $row['question1']; ?>"><br>
            <label for="question2">Question 2:</label>
            <input type="text" name="question2" value="<?php echo $row['question2']; ?>"><br>
            <label for="question3">Question 3:</label>
            <input type="text" name="question3" value="<?php echo $row['question3']; ?>"><br>
            <label for="selectQuestion">Select Question:</label>
            <input type="text" name="selectQuestion" value="<?php echo $row['selectQuestion']; ?>"><br>
            <input type="submit" name="modif" value="Modifier">
        </form>
        <?php
    }
} else {
    echo "Aucune question trouvée.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>
