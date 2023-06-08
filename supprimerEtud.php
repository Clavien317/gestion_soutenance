<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Etudiant</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <style>
    th
        {
            background-color: black;
            color: white;
            padding: 5px;
        }
        td
        {
            background-color: white;
        }
        table
        {
            margin-top: 5vw;
            margin-left: 5%;
        }
    </style>
    </head>
    <body>
    <?php
   try
   {
       $bdd = new PDO("mysql:host=localhost;dbname=projet2", 'root', "");
   }
   catch(Exception $e)
   {
           die('Erreur : '.$e->getMessage());
   }
   $reponse = $bdd->query('SELECT * FROM etudiant');
    $bdd = new PDO("mysql:host=localhost;dbname=projet2", 'root', "");
    $id = $_GET['del_id'];
    $req =("DELETE FROM etudiant WHERE matricule =$id");

    $repo = $bdd ->prepare($req);
    if($repo->execute())
    {
        echo "<script>alert('DELETES SUCCESSFULL !');</script>"; 
        $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");

    $reponse = $conn->query("SELECT * FROM etudiant");
    while($donne = $reponse ->fetch())
    {
            ?>
        <table border="3">
            <tr>
                <th>Matricule</th>  <th>Nom</th>  <th>Prenom</th>  <th>Email</th>  <th>Niveau</th>  <th>Parcours</th>  <th>Action</th>
            </tr>

            <?php
             $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
             $reponse = $conn->query("SELECT * FROM etudiant");

            // $qry = ("SELECT * FROM etudiant");
            // $sql = exec($qry);
            while($donn = $reponse->fetch())
            {
                ?>
                <tr>
                    <td><?=$donn['matricule'] ?></td>  <td><?=$donn['nom'] ?></td>
                    <td><?=$donn['prenom'] ?></td>  <td><?=$donn['email'] ?></td> 
                    <td><?=$donn['niveau'] ?></td>   <td><?=$donn['parcours'] ?></td>
                    <td><a href="supprimerEtud.php?del_id=<?=$donn['matricule'] ?>"> Effacher</a><a href="#"  name="update">Modifier</a></td>
                </tr>
                <?php
            }
            ?>

        </table>
            <?php
    }
    $reponse->closeCursor();
    }
   
?>
    </body>
</html>

