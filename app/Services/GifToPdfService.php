<?php

namespace App\Services;

use Fpdf\Fpdf;
use Imagick;

class GifToPdfService
{
    public function convert($gifPath, $pdfPath)
    {
        $imagick = new Imagick();
        $imagick->readImage($gifPath);

        $pdf = new Fpdf();
        $pdf->AddPage();

        foreach ($imagick as $frame) {
            $pdf->Image($frame->getImageBlob(), 0, 0, 210, 297, 'PNG');
            $pdf->AddPage();
        }

        $pdf->Output('F', $pdfPath);
    }
}
