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
   $reponse = $bdd->query('SELECT * FROM organisme');
    $bdd = new PDO("mysql:host=localhost;dbname=projet2", 'root', "");
    $id = $_GET['org_id'];
    $req =("DELETE FROM organisme WHERE numero =$id");

    $repo = $bdd ->prepare($req);
    if($repo->execute())
    {
        echo "<script>alert('DELETES SUCCESSFULL !');</script>"; 



        $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");

    $reponse = $conn->query("SELECT * FROM organisme");
    while($donne = $reponse ->fetch())
    {
            ?>
        <table border="3">
            <tr>
                <th>N° Organisation</th>  <th>Entreprise</th>  <th>Lieu</th> <th>Action</th>
            </tr>


            <?php
             $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
             $reponse = $conn->query("SELECT * FROM organisme");

            // $qry = ("SELECT * FROM etudiant");
            // $sql = exec($qry);
            while($donn = $reponse->fetch())
            {
                ?>
                <tr>
                    <td><?=$donn['numero'] ?></td>  <td><?=$donn['entreprise'] ?></td>
                    <td><?=$donn['lieu'] ?></td>    
                    <td><a href="suppOrg.php?org_id=<?=$donn['numero'] ?>" name="delEtud"> Effacher</a><a href="#"  name="update">Modifier</a></td>
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

