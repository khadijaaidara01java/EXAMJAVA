<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}


    </style>
</head>
<body>

    <div class="container">
        <h2>Liste des Utilisateurs</h2>

<?php
require_once 'base.php'; // Inclure le fichier de connexion à la base de données

// Récupération des utilisateurs
$sql = "SELECT * FROM users";
$result = $connexion->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nom</th><th>Email</th><th>Classe</th><th>Action</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>"; // Utilisation de htmlspecialchars pour éviter les failles XSS
        echo "<td>" . htmlspecialchars($row["nom"]) . "</td>"; // Utilisation de htmlspecialchars pour éviter les failles XSS
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>"; // Utilisation de htmlspecialchars pour éviter les failles XSS
        echo "<td>" . htmlspecialchars($row["classe"]) . "</td>"; // Utilisation de htmlspecialchars pour éviter les failles XSS
        echo "<td><a href='modif.php?id=" . $row["id"] . "'>Modifier</a> | <a href='supprime.php?id=" . $row["id"] . "' onclick=\"return confirm('Voulez-vous vraiment supprimer cet utilisateur?');\">Supprimer</a></td>"; // Confirmation avant la suppression
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun utilisateur trouvé";
}
$connexion->close();
?>

    </div>
</body>
</html>
