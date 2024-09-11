<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PdfToWordService;

class PdfToWordController extends Controller
{
    protected $pdfToWordService;

    public function __construct(PdfToWordService $pdfToWordService)
    {
        $this->pdfToWordService = $pdfToWordService;
    }

    public function convert(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
        ]);

        $pdfFilePath = $request->file('pdf')->getPathname();
        $wordFilePath = storage_path('app/public/converted.docx');

        $this->pdfToWordService->convert($pdfFilePath, $wordFilePath);

        return response()->download($wordFilePath);
    }
}
