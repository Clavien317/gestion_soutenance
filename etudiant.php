<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="php/css/style.css">
    <style>
      body{
              background-image: url('php/img/third.jpg');
            } 
    </style>
    <title>Resistre des etudiant</title>
</head>
<body>


<div class="container" >
<a href="index.html" style="text-decoration:none;"> 
    <button name="" class="back back">
                <img src="img/back-icon.png" alt="">
               
            
                <a href="index.html"></a>
    </button>

     <h1 class="label" >
          Etudiant</h1>
    <form class="Login_form" method="POST">
         <p class="font">Matricule  </p>
         <input autocomplete="off" type="text" name="num" required>
        
         <p class="font font2">Nom </p>
         <input type="text" name="nom" required>

         <p class="font font2">Prenom </p>
         <input type="text" name="prenom" required>

         <p class="font font2">Email</p>
         <input type="text" name="email" required>
        <br>
        <br>
        <label for="">Niveau</label>
        <select name="niveau" >
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
      
         <button class="button button1">Annuler</button>
         <button name="valid" class="button button2">Enregistrer</button>  
    </form>


  </div>


    <?php

    if(isset($_POST['valid']))
    {
        if(empty($_POST['num']) and empty($_POST['nom']) and empty($_POST['prenom']) and empty($_POST['email']) and empty($_POST['niveau']) and empty($_POST['parcours']))
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
            $req = ("INSERT INTO etudiant (matricule,nom,prenom,email,niveau,parcours)
             VALUES ('$matricule','$nom','$prenom','$email','$niveau','$parcours')");

             $reponse = $conn ->prepare($req);
             $reponse->execute();

             if($reponse)
             {
                echo "<script>alert('Envoyer avec succes !')</script>";
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