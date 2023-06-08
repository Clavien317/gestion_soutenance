<?php
$conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
if(isset($_GET['mod_id'])){
    $id = $_GET['mod_id'];
    $sql = "SELECT * FROM soutennir WHERE matricule = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $donn = $stmt->fetch();
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Etudiant</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="php/css/modifSout.css" rel="stylesheet">
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

    <h1>Modification </h1>

<fieldset>
        <legend>Formulaire</legend>
        <form action="" method="post">
        <br>
        <br>

        <label for="numero">Matricule</label>
        <br>
        <input type="text" name="num" value="<?=$donn['matricule'] ?>">
        <br>
        <br>
        <label for="idorg">numero_org</label>
        <br>
        <input type="text" name="org" value="<?=$donn['num_organisation'] ?>">
        <br>
        <br>
        <label for="annee univ">Annee univ</label>
        <br>
        <input type="text" name="anne" value="2022/2023">
        <br>
        <br>
        <label for="note">note</label>
        <br>
        <input type="text" name="note" value="<?=$donn['note'] ?>">
        <br>
        <br>
        <label for="prd">president</label>
        <br>
        <input type="text" name="prd" value="<?=$donn['president'] ?>">
        <br>
        <br>
        <label>date</label>
        <br>
        <input type="date" name="date" value="<?=$donn['date'] ?>">
        <br>
        <br>
        <br>
        <br>
        <button>Annuler</button> <button name="valide" class="submit">Modifier</button>
    </form>
    </fieldset>

        <?php

        if(isset($_POST['valide']))
        {
            if(empty($_POST['num']) and empty($_POST['org']) and empty($_POST['anne']) and empty($_POST['note']) and empty($_POST['prd']))
            {
                echo "<h1 id='erreur'> Il faut completer tout le champ </h1>";
            }
            else
            {
                $matricule = htmlspecialchars($_POST['num']);
                $num_org = htmlspecialchars($_POST['org']);
                $anne = htmlspecialchars($_POST['anne']);
                $note = htmlspecialchars($_POST['note']);
                $prd = htmlspecialchars($_POST['prd']);
                $date = htmlspecialchars($_POST['date']);

        
                $conn = new PDO("mysql:host=localhost;dbname=projet2","root","");
                $req =("UPDATE soutennir SET matricule='$matricule',num_organisation='$num_org',anne_univ='$anne',note=$note,president='$prd',date='$date' WHERE matricule=$id");
                $reponse = $conn ->prepare($req);
                $reponse->execute();
    
                 if($reponse)
                 {
                    echo "<script>alert('Modifier avec succes !')</script>";
                 }
                 else
                 {
                    echo "<script>alert('NON Modifier ...')</script>";
                 }
    
            }
        }
    

        ?>



    </body>
</html>

