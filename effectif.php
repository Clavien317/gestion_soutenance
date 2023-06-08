<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>effectif</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion à la base de données

 $conn= new PDO("mysql:host=localhost;dbname=projet2","root","");
    // Récupération des données des étudiants par niveau
    $stmt = $conn->prepare("
        SELECT niveau, COUNT(*) AS Effectif_Total
        FROM etudiant
        GROUP BY niveau
      ORDER BY niveau ASC
    ");
    $stmt->execute();
    $etudiants_par_niveau = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des données dans un tableau HTML
    echo '<table border="3">';
    echo '<thead><tr><th>Niveau</th><th>Effectif Total</th></tr></thead>';
    echo '<tbody>';
    foreach ($etudiants_par_niveau as $etudiant)
    {
        echo '<tr>';
        echo '<td>' . $etudiant['niveau'] . '</td>';
        echo '<td>' . $etudiant['Effectif_Total'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

$connexion=null;
?>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        text-align: center;
        padding: 8px;
    }
    th {
        background-color: blue;
        color: white;
        font-style: italic;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    hr {
        border: 0;
        height: 1px;
        background-color: #ccc;
        margin-bottom: 20px;
    }
    p {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }
</style> 
</body>
</html>