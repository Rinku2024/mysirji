<?php
namespace App\Services;

use Dompdf\Dompdf;
use Dompdf\Options; // Import the Options class
use PhpOffice\PhpWord\IOFactory;

class WordToPdfService
{
    public function convertToPdf($wordFilePath, $pdfFilePath)
    {
        // Load the Word document
        $phpWord = IOFactory::load($wordFilePath);

        // Save the Word document as HTML
        $htmlFilePath = tempnam(sys_get_temp_dir(), 'word') . '.html';
        $phpWord->save($htmlFilePath, 'HTML');

        // Load the HTML content into Dompdf
        $dompdf = new Dompdf();

        // Create an Options instance and set options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('chroot', sys_get_temp_dir()); // Set chroot to the temp directory

        // Set the options to Dompdf
        $dompdf->setOptions($options);

        // Load HTML file
        $dompdf->loadHtmlFile($htmlFilePath);
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Save the PDF to the specified path
        file_put_contents($pdfFilePath, $dompdf->output());

        // Clean up the temporary HTML file
        unlink($htmlFilePath);
    }
}
