<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    padding: 10px 0;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    text-align: center;
}

nav ul li {
    display: inline;
    display: flex;
}

nav ul li a {
    display: block;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: #555;
}
    </style>
    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Quiz</a></li>
            <li><a href="#">Résultats</a></li>
            <li><a href="#">Se Deconnecter</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <?php
require_once("jsexam_bd.php");

    $query_questions = "SELECT id_question, question1 FROM question";
    $stmt_questions = $connect->prepare($query_questions);
    $stmt_questions->execute();
    $questions = $stmt_questions->fetchAll(PDO::FETCH_ASSOC);

    foreach ($questions as $question) {
        echo "<div class='question'>";
        echo "<p><strong>Question :</strong> " . $question['question1'] . "</p>";

        $query_reponses = "SELECT reponse, libelle FROM questions WHERE id_options = :id_options";
        $stmt_reponses = $connect->prepare($query_reponses);
        $stmt_reponses->bindParam(':id_options', $question['id_options']);
        $stmt_reponses->execute();
        $reponses = $stmt_reponses->fetchAll(PDO::FETCH_ASSOC);

        echo "<form>";
        foreach ($reponses as $reponse) {
            echo "<input type='radio' name='questions" . $question['id_options'] . "' value='" . $reponse['reponse'] . "'>";
            echo "<label>" . $reponse['libelle'] . "</label><br>";
        }
        echo "</form>";
        echo "</div>";
        echo "<hr>";
    }
    ?>
</div>

</body>
</html>