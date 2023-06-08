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
   $reponse = $bdd->query('SELECT * FROM professeur');
    $bdd = new PDO("mysql:host=localhost;dbname=projet2", 'root', "");
    $id = $_GET['id'];
    $req =("DELETE FROM professeur WHERE idprof =$id");

    $repo = $bdd ->prepare($req);
    if($repo->execute())
    {
        echo "<script>alert('DELETES SUCCESSFULL !');</script>"; 



        $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");

    $reponse = $conn->query("SELECT * FROM professeur");
    while($donne = $reponse ->fetch())
    {
            ?>
        <table border="3">
            <tr>
                <th>Matricule</th>  <th>Nom</th>  <th>Prenom</th>  <th>Civil</th>  <th>Grade</th> <th>Action</th>
            </tr>


            <?php
             $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
             $reponse = $conn->query("SELECT * FROM professeur");

            // $qry = ("SELECT * FROM etudiant");
            // $sql = exec($qry);
            while($donn = $reponse->fetch())
            {
                ?>
                <tr>
                    <td><?=$donn['idprof'] ?></td>  <td><?=$donn['nom'] ?></td>
                    <td><?=$donn['prenom'] ?></td>  <td><?=$donn['civil'] ?></td> 
                    <td><?=$donn['grade'] ?></td>   
                    <td><a href="suppProf.php?id=<?=$donn['idprof'] ?>"> Supprimer</a><a href="#"  name="update">Modifier</a></td>
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

