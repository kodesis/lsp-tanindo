<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
  public function generate($html, $filename = '',  $paper = '', $orientation = '', $stream = TRUE)
  {
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();

    if ($stream) {
      // Force inline preview
      header('Content-Type: application/pdf');
      header('Content-Disposition: inline; filename="' . $filename . '.pdf"');
      header('Cache-Control: private, max-age=0, must-revalidate');
      header('Pragma: public');

      $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
      exit();
    } else {
      return $dompdf->output();
    }
  }
}
