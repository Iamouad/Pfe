<?php

require ('fpdf/fpdf.php');
require ('DataBaseManager.php');
$db = new DataBaseManager();


//simple model
if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $nom = "HEDABOU";
        $query = $db->getStudents($nom);

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetAutoPageBreak(true);
        $pdf->SetMargins(10, 10);
        $pdf->AddPage();


//creating a title in the middle of the page starting at x:70
        $pdf->SetXY(70,70);
        $pdf->SetFont("Arial", "B", 16);
        $pdf->Cell(70, 10, 'Etudiants encadrés par Mr: '.ucfirst($nom), 0, 0, 'C');
//creating a rectangle to contain today's date
        $date = date("l").' '.date("d/M/Y");
        $pdf->SetLineWidth(0.2);
        $pdf->SetFillColor(192);
        $pdf->SetDrawColor(100, 0, 100);
        $pdf->Rect(150, 15, 50, 10 , "DF");
        $pdf->SetXY(150, 15);
        $pdf->SetFont("Arial", "B", 14);
        $pdf->Cell(50, 10, $date, 0, 0, 'C');

    $pdf->SetXY(10,80);
    $pdf->SetFont("Arial", "B", 8);
    $pdf->Cell(200, 20, "Je soussigne Monsieur Bouarifi, chef département Informatique, Réseaux et telecoms que: ", 0, 0, 'C');
    $pdf->SetXY(10,90);
    $pdf->SetFont("Arial", "B", 8);
    $pdf->Cell(200, 10, "Monsieur Hedabou a assure l'encadrement des projets suivants :", 0, 0, 'C');

//
//creating a table
        $pdf->SetXY(15, 100);
        $pdf->SetFontSize(6);
//table header
        $header = array('Année universitaire', 'Nom et prenom', 'Intitulé pfe');
        $i = 0;
        foreach($header as $col){
            if($i == 2){
                $pdf->Cell(100,10,$col,1);
                break;
            }
            else{
                $pdf->Cell(40,10,$col,1);
            }
            $i++;


        }

        $pdf->Ln();
//table content from data base as source
        while($data = $query->fetch()){

            if(isset($_POST[$data['nom1']])){
                $nomComplet = $data['nom1'].' '.$data['prenom1'];
                $date = $data['date'];
                $token = strtok($date, "-");
                $anneeUniversitaire = $token;
                $cols = array($anneeUniversitaire, $nomComplet, $data['sujet']);
                $pdf->SetX(15);
                $i = 0;
                foreach ($cols as $col){
                    if($i == 2){
                        $pdf->Cell(100,10,$col,1);
                        break;
                    }
                    else{
                        $pdf->Cell(40,10,$col,1);
                    }
                    $i++;
                }

                $pdf->Ln();
            }
        }

//output I send the file inline to the browser D to force download
        $pdf->Output("I", "testFpdf.pdf");


}