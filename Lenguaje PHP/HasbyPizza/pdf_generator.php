<?php
require_once("./tcpdf.php");
define('PDF_PAGE_ORIENTATION', 'P');
define('PDF_UNIT', 'mm');
define('PDF_PAGE_FORMAT', 'A4');


$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator('HasbyPizza');
$pdf->SetAuthor('ShahZaib');
$pdf->SetTitle('Ticket');
$pdf->SetSubject('Pizza');
$pdf->SetKeywords('PDF');

$pdf->AddPage();

$html = file_get_contents('./ticket.php'); 

$pdf->writeHTML($html, true, true, true, true, '');

$pdf->Output('ticket.pdf', 'D'); 
?>
