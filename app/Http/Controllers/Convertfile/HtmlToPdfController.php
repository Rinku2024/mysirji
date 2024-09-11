<?php

namespace App\Http\Controllers\Convertfile;

use App\Http\Controllers\Controller;
use App\Services\HtmlToPdfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HtmlToPdfController extends Controller
{
    protected $htmlToPdfService;

    public function __construct(HtmlToPdfService $htmlToPdfService)
    {
        $this->htmlToPdfService = $htmlToPdfService;
    }

    public function showForm()
    {
        return view('frontend.convertfile.uploadhtml'); // Correct view path
    }

    public function uploadHtml(Request $request)
    {
        $request->validate([
            'html_file' => 'required|file|mimes:html|max:2048',
        ]);

        $file = $request->file('html_file');
        $htmlContent = file_get_contents($file->getRealPath());
        $outputPath = storage_path('app/public/converted.pdf');

        $this->htmlToPdfService->convertHtmlToPdf($htmlContent, $outputPath);

        return response()->download($outputPath);
    }
}
