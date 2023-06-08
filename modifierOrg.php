<?php
$conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
if(isset($_GET['org_id'])){
    $id = $_GET['org_id'];
    $sql = "SELECT * FROM organisme WHERE numero = '$id'";
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
        <link href="php/css/modifOrg.css" rel="stylesheet">
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

    <h1>Modification Organisme</h1>

<fieldset>
        <legend>Formulaire</legend>
        <form action="" method="post">
        <br>
        <br>

        <label for="idorg">numero_org</label>
        <br>
        <input type="text" name="num" value="<?=$donn['numero'] ?>">
        <br>
        <br>
        <label for="design">Entreprise</label>
        <br>
        <input type="text"  name="design" value="<?=$donn['entreprise'] ?>">
        <br>
        <br>
        <label for="lieu">lieu</label>
        <br>
        <input type="text" name="lieu" value="<?=$donn['lieu'] ?>">
        <br>
        <br>
        <br>
        <button>Annuler</button> <button name="valide" class="submit">Modifier</button>
    </form>
    </fieldset>

        <?php

        if(isset($_POST['valide']))
        {
            if(empty($_POST['num']) and empty($_POST['design']) and empty($_POST['lieu']))
            {
                echo "<script>alert('Envoye avec succes !')</script>";
            }
            else
            {
                $num = htmlspecialchars($_POST['num']);
                $design = htmlspecialchars($_POST['design']);
                $lieu = htmlspecialchars($_POST['lieu']);
        
        
                require "conn.php";
                $req = ("UPDATE organisme SET numero='$num',entreprise='$design',lieu='$lieu' WHERE numero=$id");
                $reponse =$conn->prepare($req);
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

