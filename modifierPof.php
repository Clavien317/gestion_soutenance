<?php
$conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
if(isset($_GET['idmod'])){
    $id = $_GET['idmod'];
    $sql = "SELECT * FROM professeur WHERE idprof = '$id'";
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
        <link href="php/css/modifProf.css" rel="stylesheet">
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

    <h1>Modification Prof</h1>

<fieldset>
        <legend>Formulaire</legend>
        
        <form action="" method="post">
        <br>
        <br>

        <label>N° Prof : </label>
                <br>
                <input type="text"  name="num" value="<?=$donn['idprof'] ?>" >
                <br>
                <br>
               <label> NOM:</label>
               <br>
               <input type="text" name="nom" value="<?=$donn['nom'] ?>" >
               <br>
               <br>
                 <label>PRENOM:</label>
                 <br>
                 <input type="text" name="prenom" value="<?=$donn['prenom'] ?>" required >
                 <br>
                 <br>
                <label for=""> Civilité :</label>
                <select name="civil">  <br>
                     <option value="Mr">Mr</option><br>
                     <option value="Mlle">Mlle</option><br>
                     <option value="Mme">Mme </option><br>
                     <br>
                </select>
                <br>
                <br>
                 <label> Grade : </label>
                <select name="grade">  <br>
                    <option value="Professeur titulaire">Professeur titulaire</option><br>
                    <option value="Maître de Conférences">Maître de Conférences</option><br>
                    <option value="Assistant
                    d’Enseignement Supérieur et de Recherch">Assistant
                    d’Enseignement Supérieur et de Recherch </option><br>
                    <option value=" Docteur HDR"> Docteur HDR </option><br>
                    <option value=" Docteur en Informatique"> Docteur en Informatique </option><br>
                    <option value="Doctorant en informatique">Doctorant en informatique </option><br>
                    <br>
               </select>
                    <br>
                    <br>
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
            if(empty($_POST['num']) and empty($_POST['nom']) and empty($_POST['prenom']) and empty($_POST['civil']) and empty($_POST['grade']))
            {
                echo "<h1 id='erreur'> Il faut completer tout le champ </h1>";
            }
            else
            {
                $idprof = htmlspecialchars($_POST['num']);
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $civil = htmlspecialchars($_POST['civil']);
                $grade = htmlspecialchars($_POST['grade']);
    
                require "conn.php";
                $req = ("UPDATE professeur SET idprof='$idprof',nom='$nom',prenom='$prenom',civil='$civil',grade='$grade' WHERE idprof= '$id' ");
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

