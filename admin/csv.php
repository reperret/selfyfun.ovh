<?php
require_once('phpexcel/Classes/PHPExcel.php');
include 'api/bdd.php';
include 'api/fonctionsUtiles.php';

$dateDebut=date('Y')."-01-01";
$dateFin="2100-01-01";
$typeMagasin=NULL;

if(isset($_POST['dateDebut']) && $_POST['dateDebut']!='' ) $dateDebut=$_POST['dateDebut'];
if(isset($_POST['dateFin']) && $_POST['dateFin']!='' ) $dateFin=$_POST['dateFin'];
if(isset($_POST['typeMagasin']) && $_POST['typeMagasin']!='' ) $typeMagasin=$_POST['typeMagasin'];

$export=getExports($dateDebut,$dateFin,$typeMagasin,$dbh);
//echo json_encode($export);


$doc = new PHPExcel();

//*****GPSPORTS******
$objWorkSheet = $doc->createSheet(0);
$doc->setActiveSheetIndex(0);
$doc->getActiveSheet()->fromArray($export);
$objWorkSheet->setTitle("GpSport et GpTransport");


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . "export.xls" . '"');
header('Cache-Control: max-age=0'); 

$objWriter = PHPExcel_IOFactory::createWriter($doc, 'Excel5');
$objWriter->save('php://output');
?>