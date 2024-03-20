<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joueur - Répondre aux Questions</title>
  <style>
    body{
      background-color: #f2f2f2;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      
    }
  </style>
</head>
<body>
<ul class="dec"><button><a href="form/decon.php">Deconnecter</a></button></ul>
  <div class="container">
    <h2>Répondez aux Questions</h2>
    
    <form action="quiz_result.php" method="post">
    <?php
// Connexion à la base de données
  require_once('admin/base.php');

// Requête SQL pour récupérer les questions
$sql = "SELECT * FROM question";
$result = $connexion->query($sql);

// Vérifier s'il y a des questions
if ($result->num_rows > 0) {
    // Afficher les questions sous forme de formulaire
    echo "<form action='quiz_result.php' method='post'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='question'>";
        echo "<h3>" . $row["question1"] . "</h3>";
        echo "<input type='radio' name='question_" . $row["id_question"] . "' value='option1'>" . $row["question2"] . "<br>";
        echo "<input type='radio' name='question_" . $row["id_question"] . "' value='option2'>" . $row["question3"] . "<br>";
        echo "<input type='radio' name='question_" . $row["id_question"] . "' value='option3'>" . $row["selectQuestion"] . "<br>";
        echo "</div>";
    }
    echo "<input type='submit' value='Soumettre'>";
    echo "</form>";
} else {
    echo "Aucune question trouvée.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>

</div>
</body>
</html>
