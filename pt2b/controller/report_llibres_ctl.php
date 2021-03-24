<?php
require_once '../config/config.inc.php';
require_once './function_autoload.php';
require_once '../util/fpdf/fpdf.php';
require_once '../view/printMsg.php';
require_once '../view/linkLlibres.php';    
    $llibreDAO = new llibreDAO();
    $arrayLlibres = $llibreDAO->veureLlibres();
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','','13');
    $pdf->SetFillColor(205,205,205);
    $pdf->Cell(30,10,utf8_decode('Id'),1,0,'C',true);
    $pdf->Cell(50,10,utf8_decode('Títol'),1,0,'C',true);
    $pdf->Cell(50,10,utf8_decode('Data de publicació'),1,0,'C',true);
    $pdf->Cell(50,10,utf8_decode('Autor'),1,0,'C',true);
    $pdf->Ln(10);
    $pdf->SetFillColor(250,250,250);
    if(!(empty($arrayLlibres))){
        foreach($arrayLlibres as $llibre){
                $pdf->Cell(30,10,utf8_decode($llibre->getId()),1,0,'C',true);
                $pdf->Cell(50,10,utf8_decode($llibre->getTitol()),1,0,'C',true);
                $pdf->Cell(50,10,utf8_decode($llibre->getDataPublic()),1,0,'C',true);
                $pdf->Cell(50,10,utf8_decode($llibre),1,0,'C',true); 
                $pdf->Ln(10);
            }
    }
    
    $pdf->Output('D','report_llibres.pdf');
?>