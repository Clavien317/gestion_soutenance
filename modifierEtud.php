<?php
$conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
if(isset($_GET['modifier_id'])){
    $id = $_GET['modifier_id'];
    $sql = "SELECT * FROM etudiant WHERE matricule = '$id'";
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
        <link href="php/css/modifEtud.css   " rel="stylesheet">
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
    

    <h1>Modification etudiant</h1>

<fieldset>

        <legend>Formulaire</legend>
        <form action="" method="post">
        
        <br>
        <br>
        <label for="">Matricule</label>
        <br>
        <input type="text" name="num" value="<?=$donn['matricule'] ?>">
        <br>
        <br>

        <label for="">Nom</label>
        <br>
        <input type="text" name="nom" value="<?=$donn['nom'] ?>">
        <br>
        <br>

        <label for="">Prenom</label>
        <br>
        <input type="text" name="prenom" value="<?=$donn['prenom'] ?>">
        <br>
        <br>

        <label for="">Email</label>
        <br>
        <input type="text" name="email" value="<?=$donn['email'] ?>">
        <br>
        <br>

        <label for="">Niveau</label>
        <select name="niveau">
            <option value="L1">L1</option>
            <option value="L2">L2</option>
            <option value="L3">L3</option>
            <option value="M1">M1</option>
            <option value="M2">M2</option>
        </select>
        <br>
        <br>

        <label for="">Parcours</label>
        <select name="parcours">
            <option value="GB">GB</option>
            <option value="ASR">ASR</option>
            <option value="IG">IG</option>
        </select>
        <br>
        <br>
        <br>
        <button>Annuler</button> <button name="valide" class="submit">Modifier</button>
    </form>
    </fieldset>

        <?php

        if(isset($_POST['valide']))
        {
            if( empty($_POST['num']) and empty($_POST['nom']) and empty($_POST['prenom']) and empty($_POST['email']) and empty($_POST['niveau']) and empty($_POST['parcours']))
            {
                echo "<h1 id='erreur'> Il faut completer tout le champ </h1>";
            }
            else
            {
                $matricule = htmlspecialchars($_POST['num']);
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);
                $niveau = htmlspecialchars($_POST['niveau']);
                $parcours = htmlspecialchars($_POST['parcours']);
    
                require "conn.php";
                 $req = ("UPDATE etudiant SET matricule='$matricule',nom='$nom',prenom='$prenom',email='$email',niveau='$niveau',parcours='$parcours' WHERE matricule=$id");
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

