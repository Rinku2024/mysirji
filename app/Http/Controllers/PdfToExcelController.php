<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PdfParser\PdfParser; // Make sure to install the necessary PDF parsing library

class PdftoExcelController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pdftool.pdftoexcel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:10000', // Adjust the validation as needed
        ]);

        $file = $request->file('file');
        $pdfPath = $file->storeAs('pdfs', 'temp.pdf'); // Save the PDF file temporarily

        // Parse PDF file
        $pdfParser = new PdfParser();
        $pdf = $pdfParser->parseFile(storage_path('app/' . $pdfPath));
        $text = $pdf->getText();

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Split the PDF text into lines and add them to the spreadsheet
        $lines = explode("\n", $text);
        foreach ($lines as $key => $line) {
            $sheet->setCellValue('A' . ($key + 1), $line);
        }

        // Save the spreadsheet as an Excel file
        $writer = new Xlsx($spreadsheet);
        $excelPath = 'excel/converted.xlsx';
        $writer->save(storage_path('app/' . $excelPath));

        // Return the file to the user
        return response()->download(storage_path('app/' . $excelPath));
    }
}
