<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    require_once"admin/base.php";

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("La connexion a échoué : " . $connexion->connect_error);
    }

    // Initialiser le score
    $score = 0;

    // Récupérer les réponses fournies par l'utilisateur et les bonnes réponses de la base de données
    $sql = "SELECT id_options, bonreponse FROM options";
    $result = $connexion->query($sql);

    // Vérifier s'il y a des données dans la base de données
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Récupérer la réponse fournie par l'utilisateur pour cette question
            $user_response = $_POST['question_' . $row['id_options']];
            // Comparer la réponse de l'utilisateur avec la bonne réponse
            if ($user_response == $row['bonreponse']) {
                // Incrémenter le score si la réponse est correcte
                $score++;
            }
        }
    }

    // Afficher le score final
    echo "<h2>Votre score final est : $score</h2>";

    // Fermer la connexion à la base de données
    $connexion->close();
}
?>
