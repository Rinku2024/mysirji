<?php

namespace App\Services;

use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class PdfToWordService
{
    public function convert($pdfFilePath, $wordFilePath)
    {
        // Parse PDF
        $parser = new Parser();
        $pdf = $parser->parseFile($pdfFilePath);
        $text = $pdf->getText();
        
        // Create Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText($text);

        // Save as DOCX
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($wordFilePath);
    }
}
