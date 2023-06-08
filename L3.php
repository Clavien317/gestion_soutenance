<?php
if(isset($_POST['etudiant']))
{
    $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");
    $reponse = $conn->query("SELECT * FROM etudiant");
?>
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
             $reponse = $conn->query("SELECT * FROM etudiant WHERE niveau=\"L3\"");

            // $qry = ("SELECT * FROM etudiant");
            // $sql = exec($qry);
            $effectif =$reponse->rowcount();


            
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
        <table>
            <tr>
                <th>Effecif  L3:</thtotal>
                <th><?=$effectif?></th>
            </tr>
        </table>

            <?php
    }
    $reponse->closeCursor();
  

 
}

?>
