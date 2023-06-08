<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="php/css/style.css">
    <style>
    #erreur
    {
        color: red;
    }
    body{
          background-image: url('img/third.jpg');
        } 
    </style>
    <title>professeur</title>
</head>
<body>
<div class="container" >
<a href="index.html" style="text-decoration:none;"> 
    <button name="" class="back back">
                <img src="img/back-icon.png" alt="">
               
            
                <a href="index.html"></a>
    </button>

        <h1 class="label" >Proffesseur</h1>
       <form class="Login_form" method="post">
            <p class="font">Id Prof </p>
            <input autocomplete="off" type="text" name="num">
           
            <p class="font font2">NOM </p>
            <input type="text" name="nom">
   
            <p class="font font2">Prenom </p>
            <input type="text" name="prenom">
   
            
           <br>
           <br>
           <label for="">Civilité :</label>
           <select name="civil">
               <option value="Mr">Mr</option>
               <option value="Mlle">Mlle</option>
               <option value="Mme">Mme</option>
              
           </select>
           <br>
           <br>
                <br>
                <br>
                 <label> Grade : </label>
                <select name="grade" id="sexe" >  <br>
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
                    <button type="reset">ANNULER</button> <button name="valid" class="sub" type="submit">Enregistrer</button>
                    
        </form>
    </div>


    <?php

if(isset($_POST['valid']))
{
    if( empty($_POST['num']) and empty($_POST['nom']) and empty($_POST['prenom']) and empty($_POST['civil']) and empty($_POST['grade']))
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

        $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
        $req = ("INSERT INTO professeur (idprof,nom,prenom,civil,grade) VALUES ('$idprof','$nom','$prenom','$civil','$grade')");

         $reponse = $conn ->prepare($req);
         $reponse->execute();

         if($reponse)
         {
            echo "<script>alert('Envoye avec succes !')</script>";
         }
         else
         {
            echo "<script>alert('NON ENREGISTRER ...')</script>";
         }

    }
}

?>
    
</body>
</html>