<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WordToPdfService;


class DocumentController extends Controller
{
    protected $wordToPdfService;

    public function __construct(WordToPdfService $wordToPdfService)
    {
        $this->wordToPdfService = $wordToPdfService;
    }

    public function convert(Request $request)
    {
        // Validate the request
        $request->validate([
            'wordFile' => 'required|file|mimes:doc,docx',
        ]);

        // Store the uploaded Word document
        $wordFilePath = $request->file('wordFile')->store('uploads');

        // Define the PDF file path
        $pdfFilePath = storage_path('app/uploads/' . pathinfo($wordFilePath, PATHINFO_FILENAME) . '.pdf');

        // Convert the Word document to PDF
        $this->wordToPdfService->convertToPdf(storage_path('app/' . $wordFilePath), $pdfFilePath);

        // Return the PDF file as a response
        return response()->download($pdfFilePath);
    }
}
