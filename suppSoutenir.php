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
   $reponse = $bdd->query('SELECT * FROM soutennir');
    $bdd = new PDO("mysql:host=localhost;dbname=projet2", 'root', "");
    $id = $_GET['soutenir_id'];
    $req =("DELETE FROM soutennir WHERE matricule =$id");

    $repo = $bdd ->prepare($req);
    if($repo->execute())
    {
        echo "<script>alert('DELETES SUCCESSFULL !');</script>"; 



        $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");

    $reponse = $conn->query("SELECT * FROM soutennir");
    while($donne = $reponse ->fetch())
    {
            ?>
        <table border="3">
            <tr>
                <th>Matricule</th>  <th>N° Organisation</th>  <th>anne_univ</th>  <th>Note</th>  <th>President</th> <th>Action</th>
            </tr>


            <?php
             $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
             $reponse = $conn->query("SELECT * FROM soutennir");

            // $qry = ("SELECT * FROM etudiant");
            // $sql = exec($qry);
            while($donn = $reponse->fetch())
            {
                ?>
                <tr>
                    <td><?=$donn['matricule'] ?></td>  <td><?=$donn['num_organisation'] ?></td>
                    <td><?=$donn['anne_univ'] ?></td>  <td><?=$donn['note'] ?></td> 
                    <td><?=$donn['president'] ?></td>   
                    <td><a href="suppSoutenir.php?matricule=<?=$donn['matricule'] ?>" name="delEtud"> Effacher</a><a href="#"  name="update">Modifier</a></td>
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

