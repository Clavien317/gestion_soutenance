<?php 
    require('./tuto_fpdf/fpdf.php');
    // require_once "admin.php";
    $conn = new PDO("mysql:host=localhost; dbname=projet2","root","");


    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','',14);
 
   $matricule = htmlspecialchars($_POST['num']);
   $sql = $conn->prepare("SELECT * FROM etudiant,soutennir WHERE etudiant.matricule = soutennir.matricule AND etudiant.matricule = '$matricule'");
   $sql->execute();
   $essai = $sql->fetchAll(PDO::FETCH_OBJ);
   if(!empty($essai)){
    $pdf->setFont('Arial','B');
    $pdf->Cell(0,10,'PROCES VERBAL',0,1,'C');
    $pdf->Ln();
    $pdf->setFont('Arial','B');
    $pdf->Cell(0,10,'SOUTENANCE DE FIN D ETUDES POUR L\'OBTENTION DU DIPLOME DE LICENCE',0,0,'C');
    $pdf->Ln();
    $pdf->Cell(0,10,'PROFESSIONNELLE',0,1,'C');
    //$pdf->Ln();
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(92,10,'Mention :',0,0,'R');
    $pdf->SetFont('Arial','',14);
    $pdf->Cell(50,10,'Informatique',0,1);
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(94,10,'Parcours :',0,0,'R');
    $pdf->SetFont('Arial','',14);

    //parcours
    
   foreach($essai AS $teste){
    $pdf->Cell(50,10,$teste->parcours,0,1);
    
    //nom etudiant
    $pdf->Cell(0,10,'Mlle/Mr:'.$teste->nom." ".$teste->prenom,0,1);
}

    $pdf->Cell(0,10,'a soutenu publiquement son memoire de fin d etudes pour l\'obtention du diplome de',0,1);
    $pdf->Cell(0,10,'Licence professionnelle.',0,1);
    $pdf->Cell(174,10,'Apres la deliberation, la commission des membres du Jury a attribue la note de ',0,0);
    $pdf->SetFont('Arial','B',14);
    
    $req = $conn->prepare("SELECT * FROM soutennir WHERE matricule = ?");
    $req->execute(array($matricule));
    $note = $req->fetchAll(PDO::FETCH_OBJ);
    foreach($note AS $exemple)
    {
        $pdf->Cell(20,10,$exemple->note."/20",0,1);
        $pdf->SetFont('Arial','',14);
        $pdf->Ln();
        $pdf->Cell(0,10,'Membre de Jury',0,1);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(35,10,'President :',0,0);
        $pdf->SetFont('Arial','',14);
        //president
        $pdf->Cell(20,10,$exemple->president,0,1);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(35,10,'Examinateur :',0,0);
        //examinateur
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(0,10,$exemple->examinateur,0,1);
        $pdf->SetFont('Arial','B',14);
        // //rapporteur
        // $pdf->Cell(35,10,'Rapporteur :',0,0);
        // $pdf->SetFont('Arial','',14);
        // $pdf->Cell(0,10,$exemple->RapporteurInt,0,1);
        // $pdf->Cell(35,10,'',0,0);
        // $pdf->Cell(0,10,$exemple->RapporteurExt,0,1);

}

}else{
    
    $pdf->setFont('Arial','',30);
    $pdf->Cell(0,10,"Veuiller verifier votre matricule",0,1,'C');
    
    $pdf->setFont('Arial','',20);
    $pdf->Cell(0,10,'car votre numero matricule n\'existe pas',0,1,'C');
    $pdf->Cell(0,10,"dans la liste des etudiants.",0,1,'C');
}

    

    $pdf->Output();
?>