<?php

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf{
  public function __construct(){
    parent::__construct();
  }
}

// $pdf->loadHtml('');
// $pdf->setPaper('A4', 'landscape');
// $pdf->render();
// $pdf->stream('result.pdf', Array('Attacment'=>0));