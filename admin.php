<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administration</title>
    <link rel="stylesheet" href="php/css/admin.css">
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
        body{
          background-image: url('img/third.jpg');
        } 

        form
        {
            background: #00464F;
        }

</style>
</head>
<body>



<form method="post">
    
    <button name="etudiant">Etudiant</button>
    <button name="professeur">Professeur</button>
    <button name="organisme">Organisme</button>
    <button name="soutenir">Soutennir</button>
    <br>
    <br>
    <br>
    <button name="encore">Soutenance en cours</button>
    <button id="retour"><a href="index.html" >Menu</a>
    
</button>

</form>


    <?php
if(isset($_POST['etudiant']))
{
    $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
    $reponse = $conn->query("SELECT * FROM etudiant");
?>

    

<form method="post">
    <input type="search" name="val" placeholder="chercher matricule ou nom d'etudiant ..."><button name="recherche">Rechercher</button>
</form>
<br>

<?php
    while($donne = $reponse ->fetch())
    {
            ?>



<br>
<br>

        <table border="3">
            <tr>
                <th>Matricule</th>  <th>Nom</th>  <th>Prenom</th>  <th>Email</th>  <th>Niveau</th>  <th>Parcours</th>  <th>Action</th>
            </tr>
            <?php
             $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
             $reponse = $conn->query("SELECT * FROM etudiant");

            // $qry = ("SELECT * FROM etudiant");
            // $sql = exec($qry);
            while($donn = $reponse->fetch())
            {
                ?>
                <tr>
                    <td><?=$donn['matricule'] ?></td>  <td><?=$donn['nom'] ?></td>
                    <td><?=$donn['prenom'] ?></td>  <td><?=$donn['email'] ?></td> 
                    <td><?=$donn['niveau'] ?></td>   <td><?=$donn['parcours'] ?></td>
                    <td><a href="supprimerEtud.php?del_id=<?=$donn['matricule'] ?>">Supprimer</a><a href="modifierEtud.php?modifier_id=<?=$donn['matricule'] ?>">Modifier</a></td>
                </tr>
                <?php
            }
            ?>

        </table>
    
            <?php
    }
    $reponse->closeCursor();

    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<div class="eff">
    <?php
include "L1.php";
include "L2.php";
include "L3.php";
?>
</div>
<?php

}



if(isset($_POST['recherche']))
{
    if(!empty($_POST['val']))
    {
        $val = $_POST['val'];
        $connexion = new PDO("mysql:host=localhost;dbname=projet2","root","");
        $req = ("SELECT * FROM etudiant WHERE nom  LIKE '%$val%' || matricule LIKE '%$val%'");
        $reponse = $connexion ->prepare($req);
        $reponse->execute();
        if($reponse)
        {
            ?>
            <table border="3">
            <tr>
                <th>Matricule</th>  <th>Nom</th>  <th>Prenom</th>  <th>Email</th>  <th>Niveau</th>  <th>Parcours</th>  <th>Action</th>
            </tr>
            <?php
                   $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
                   $reponse = $conn->query("SELECT * FROM etudiant WHERE nom  LIKE '%$val%' || matricule LIKE '%$val%'");
      
                  // $qry = ("SELECT * FROM etudiant");
                  // $sql = exec($qry);
                  while($donn = $reponse->fetch())
                  {
                      ?>
                      <tr>
                          <td><?=$donn['matricule'] ?></td>  <td><?=$donn['nom'] ?></td>
                          <td><?=$donn['prenom'] ?></td>  <td><?=$donn['email'] ?></td> 
                          <td><?=$donn['niveau'] ?></td>   <td><?=$donn['parcours'] ?></td>
                          <td><a href="supprimerEtud.php?del_id=<?=$donn['matricule'] ?>">Supprimer</a><a href="modifierEtud.php?modifier_id=<?=$donn['matricule'] ?>">Modifier</a></td>
                      </tr>
                      <?php
                  }
                  ?>

</table>
    
    <?php
}
$reponse->closeCursor();
}

        }
    
?>



<?php

if(isset($_POST['professeur']))
{
    $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");

    $reponse = $conn->query("SELECT * FROM professeur");
    while($donne = $reponse ->fetch())
    {
            ?>
        <table border="3">
            <tr>
                <th>N° Professeur</th>  <th>Civil</th>  <th>Nom</th>  <th>Prenom</th>  <th>Grade</th>  <th>Action</th>
            </tr>


            <?php
             $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
             $reponse = $conn->query("SELECT * FROM professeur");

            // $qry = ("SELECT * FROM etudiant");
            // $sql = exec($qry);
            while($donn = $reponse->fetch())
            {
                ?>
                <tr>
                    <td><?=$donn['idprof'] ?></td> <td><?=$donn['civil'] ?></td>
                      <td><?=$donn['nom'] ?></td> <td><?=$donn['prenom'] ?></td>  
                    <td><?=$donn['grade'] ?></td>
                    <td><a href="suppProf.php?id=<?=$donn['idprof'] ?>" name="delEtud">Supprimer</a><a href="modifierPof.php?idmod=<?=$donn['idprof'] ?>">Modifier</a></td>
                </tr>
                <?php
            }
            ?>

        </table>
            <?php
    }
    $reponse->closeCursor();
}


if(isset($_POST['soutenir']))
{
    $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");

    $reponse = $conn->query("SELECT * FROM soutennir");
    while($donne = $reponse ->fetch())
    {
            ?>
        <table border="3">
            <tr>
                <th>N° Matricule</th>  <th>N° Organisation</th>  <th>Annee Universitaire</th>  <th>Note</th>  <th>President</th> <th>Date</th> <th>Action</th>
            </tr>
            <?php
             $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
             $reponse = $conn->query("SELECT * FROM soutennir");

            // $qry = ("SELECT * FROM etudiant");
            // $sql = exec($qry);
            while($donn = $reponse->fetch())
            {
                ?>
                <tr>
                    <td><?=$donn['matricule'] ?></td> <td><?=$donn['num_organisation'] ?></td>
                    <td><?=$donn['anne_univ'] ?></td> <td><?=$donn['note'] ?></td>  
                    <td><?=$donn['president'] ?></td>
                    <td><?=$donn['date'] ?></td>
                    <td><a href="suppSoutenir.php?soutenir_id=<?=$donn['matricule']?>" name="delEtud">Supprimer</a><a href="modifierSout.php?mod_id=<?=$donn['matricule'] ?>">Modifier</a></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <form action="./pdf.php" method="post">
        <label> Matricule</label><input type="text" name="num"> <button type="submit">Gerer pdf</button>
        <br>
        <br>
        </form>

        <br>
        <br>
        <br>
        <br>
        <br>
           

<form action="" method="post">
<label for="">debut de recherche</label> <input type="date" name="date1" id="">
<br>
<br>
<label for="">fin de recherche</label> <input type="date" name="date2" id="">
<br>
<br>
<br>
<button type="submit" name="date_search">Rechercher</button>
</form>

<?php
    }
    $reponse->closeCursor();

}

if(isset($_POST['date_search']))
{

    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    $connexion = new PDO("mysql:host=localhost;dbname=projet2","root","");
    $req = ("SELECT * FROM soutennir WHERE date BETWEEN '$date1' AND '$date2' ");
    $reponse = $connexion ->prepare($req);
    $reponse->execute();
    if($reponse)
    {
        ?>
        <table border="3">
        <tr>
            <th>Matricule</th>  <th>Nom</th>  <th>Prenom</th>  <th>Email</th>  <th>Niveau</th>  <th>Parcours</th>  <th>Action</th>
        </tr>
        <?php
               $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
               $reponse = $conn->query("SELECT * FROM soutennir WHERE date BETWEEN '$date1' AND '$date2'");
  
              while($donn = $reponse->fetch())
              {
                  ?>
                <tr>
                    <td><?=$donn['matricule'] ?></td> <td><?=$donn['num_organisation'] ?></td>
                    <td><?=$donn['anne_univ'] ?></td> <td><?=$donn['note'] ?></td>  
                    <td><?=$donn['president'] ?></td>
                    <td><?=$donn['date'] ?></td>
                    <td><a href="suppSoutenir.php?soutenir_id=<?=$donn['matricule']?>" name="delEtud">Supprimer</a><a href="modifierSout.php?mod_id=<?=$donn['matricule'] ?>">Modifier</a></td>
                </tr>
                  <?php
              }
              ?>

</table>

<?php
}else
{
    echo "error";
}
$reponse->closeCursor();
}




if(isset($_POST['organisme']))
{
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
                    <td><?=$donn['numero'] ?></td> <td><?=$donn['entreprise'] ?></td>
                    <td><?=$donn['lieu'] ?></td> 
                    <td><a href="suppOrg.php?org_id=<?=$donn['numero']?>">Supprimer</a><a href="modifierOrg.php?org_id=<?=$donn['numero'] ?>">Modifier</a></td>
                </tr>
                <?php
            }
            ?>

        </table>
            <?php
    }
    $reponse->closeCursor();
}








if(isset($_POST['encore']))
{

    ?>
        <table border="3">
            <tr>
                <th>Matricule</th>  <th>Nom</th>  <th>Prenom</th>  <th>Email</th>  <th>Niveau</th>  <th>Parcours</th>  <th>Action</th>
            </tr>
            <?php
             $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
            //  $resp = $conn->query("SELECT * FROM etudiant,soutennir WHERE etudiant.matricule <> soutennir.matricule");

            $resp = $conn->query("SELECT * FROM soutennir S JOIN etudiant E  ON (E.matricule != S.matricule)");

            while($donn = $resp->fetch())
            {
                ?>
                <tr>
                    <td><?=$donn['matricule'] ?></td>  <td><?=$donn['nom'] ?></td>
                    <td><?=$donn['prenom'] ?></td>  <td><?=$donn['email'] ?></td> 
                    <td><?=$donn['niveau'] ?></td>   <td><?=$donn['parcours'] ?></td>
                    <td><a href="supprimerEtud.php?delete_id=<?=$donn['matricule'] ?>">Supprimer</a><a href="modifierEtud.php?modifier_id=<?=$donn['matricule'] ?>">Modifier</a></td>
                </tr>
                <?php
            }
            ?>

        </table>
    <?php
}

?>

</body>
</html>