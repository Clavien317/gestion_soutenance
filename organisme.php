<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>organisme</title>
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


                <h1 class="label" >Organisme</h1>
               <form class="Login_form"method="post">
                    <p class="font">N°Org</p>
                    <input autocomplete="off" type="text" name="num">
                   
                    <p class="font font2">Entreprise</p>
                    <input type="text" name="design">
           
                    <p class="font font2">Lieu </p>
                    <input type="text" name="lieu">
           
                    
                  
                   <br>
                   <br>
                   <br>
                 
                    <button class="button button1">Annuler</button>
                    <button class="button button2" name="sub">Enregistrer</button>
                
               </form>
            
             </div>


    <?php

if(isset($_POST['sub']))
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
        $req = ("INSERT INTO organisme (numero,entreprise,lieu) VALUES ('$num','$design','$lieu')");
        $reponse =$conn->prepare($req);
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