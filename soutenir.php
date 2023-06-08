<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soutennir</title>
    <link rel="stylesheet" href="php/css/style.css">
    <style> 
        body{
          background-image: url('img/third.jpg');
        } 

</style>
</head>
<body>

    <div class="container" >
    <a href="index.html" style="text-decoration:none;"> 
    <button name="" class="back back">
                <img src="img/back-icon.png" alt="">
               
            
                <a href="index.html"></a>
    </button>





                <h1 class="label" >Soutenir</h1>
               <form class="Login_form"method="post">
                    <p class="font">Matricule  </p>
                    <input autocomplete="off" type="text" name="num">
                   
                    <p class="font font2">N°Org</p>
                    <input type="text" name="org">
           
                    <p class="font font2">Annee_Univ</p>
                    <input type="text" name="anne" value="2022/2023">
           
                    <p class="font font2">Note</p>
                    <input type="text" name="note">
                   <br>
                   <p class="font font2">Président</p>
                   <input type="text" name="prd">
                   <br>

                   <p class="font font2">Examinateur</p>
                   <select  class="font font2" name="examinateur">
                   <option style="color: black;" value=" Mr RALAIVAO Christian">Mr RALAIVAO Christian</option>
                   <option style="color: black;"  value=" Mlle Volatiana Marielle"> Mlle Volatiana Marielle</option>
                   </select>
                   <br>

                   <p class="font font2">Date</p>
                   <input type="date" name="date">
                   <br>
                   <br>
                 
                    <button class="button button1">Annuler</button>
                    <button name="sub" class="button button2">Enregistrer</button>
                   
               </form>
             </div>


    <?php

if(isset($_POST['sub']))
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
        $examinateur = htmlspecialchars($_POST['examinateur']);
        $date = htmlspecialchars($_POST['date']);

        $conn = new PDO("mysql:host=localhost;dbname=projet2","root","");
        $req =("INSERT INTO soutennir (matricule,num_organisation,anne_univ,note,president,examinateur,date) VALUES ('$matricule','$num_org','$anne',$note,'$prd','$examinateur','$date')");
        $result = $conn ->prepare($req);
        $result ->execute();
        if($result)
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