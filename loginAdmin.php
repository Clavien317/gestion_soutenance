<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="php/css/logAdmin.css" rel="stylesheet">
        <style>
        #erreur
        {
            color: red;
        }
        </style>
    </head>
    <body>
        <h1>Seulement l'admin peut acceder dans ce page...</h1>
        <br>
        
    <form method="POST">
        <input type="password" name="pwd" placeholder="Entrer votre mot de passe..">
        <br>
        <br>
        <button name="valid" class="button button2">Connexion</button>
        </form>

        <div class="mesg">
        <?php

        if(isset($_POST['valid']))
        {
            if(!empty($_POST['pwd']))
            {
                if($_POST['pwd'] =="1234")
                {
                    echo "<div><br><br><br><br></div>

                    Connexion Reussi...
                    <br><br><br>
                    <a href=\"admin.php\">Afficher tout les table</a><br><br>"
                   ;
                }
                else
                {
                    echo "<h1 id='erreur'> Vous n'avez pas d'acces dans ce page </h1>";   
                }
            }
        }

        ?>
                    
     </div>
  
    </body>
</html>