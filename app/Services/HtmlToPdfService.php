<?php

namespace App\Services;

use Dompdf\Dompdf;
use Dompdf\Options;

class HtmlToPdfService
{
    protected $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $this->dompdf = new Dompdf($options);
    }

    public function convertHtmlToPdf($htmlContent, $outputPath)
    {
        $this->dompdf->loadHtml($htmlContent);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        file_put_contents($outputPath, $this->dompdf->output());
    }
}
