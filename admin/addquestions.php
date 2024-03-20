<?php
 include ('base.php');
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les données du formulaire
  $question1 = $_POST["question1"];
  $question2 = $_POST["question2"];
  $question3 = $_POST["question3"];
  $selectQuestion = $_POST["selectQuestion"];

  // Insérer les questions dans la table Question
  $sql = "INSERT INTO question (question1, question2, question3, selectQuestion) VALUES (?, ?, ?, ?)";
  $sql = "INSERT INTO question (question1, question2, question3, selectQuestion) VALUES (?, ?, ?, ?)";

  $stmt = $connexion->prepare($sql);

  // Insérer les valeurs des questions dans la base de données
  $stmt->bind_param("ssss", $question1, $question2, $question3, $selectQuestion);
  $stmt->execute();

  // Vérifier si l'insertion s'est bien passée
  if ($stmt->affected_rows > 0) {
    echo "Les questions ont été ajoutées avec succès.";
  } else {
    echo "Erreur lors de l'ajout des questions : " . $connexion->error;
  }

  // Fermer la déclaration et la connexion
  $stmt->close();
  $connexion->close();
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter des Questions</title>
  <style>

body {
  font-family: Arial, sans-serif;
  background-color: white;
}

.container {
  max-width: 500px;
  margin: 50px auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  font-weight: bold;
}

input[type="text"],
select {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

  </style>
</head>
<body>
  <div class="container">
    <h2>Ajouter des Questions</h2>
    <form action="addquestions.php" method="post">
      <label for="question1">Enoncer:</label>
      <input type="text" id="question1" name="question1" required><br><br>
      
      <label for="question2">Option 1:</label>
      <input type="text" id="question2" name="question2" required><br><br>
      
      <label for="question3">Option 2:</label>
      <input type="text" id="question3" name="question3" required><br><br>
      
      <label for="question4">Option 3:</label>
      <input type="text" id="question4" name="question4" required><br><br>
      
      <label for="selectQuestion">Donnez la bonne reponse a la question posée:</label>
      <select id="selectQuestion" name="selectQuestion">
        <option value="question1">option1</option>
        <option value="question2">option2</option>
        <option value="question3">option3</option>
        <option value="question4">option4</option>
      </select><br><br>
      
      <input type="submit" value="ajouter">
    </form>
  </div>
</body>
</html>
