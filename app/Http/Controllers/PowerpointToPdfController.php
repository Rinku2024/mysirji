<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpPresentation\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;

class PowerpointToPdfController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pdftool.powerpointtopdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:ppt,pptx|max:10240', // Max file size 10MB
        ]);

        // Handle file upload
        $file = $request->file('file');
        $filePath = $file->store('ppt_files');

        // Load the PowerPoint file
        $ppt = IOFactory::load(storage_path('app/' . $filePath));

        // Convert PowerPoint to HTML
        $html = $this->convertPptToHtml($ppt);

        // Define paths
        $pdfDir = storage_path('app/pdf_files');
        $pdfPath = $pdfDir . '/' . basename($filePath, '.' . $file->getClientOriginalExtension()) . '.pdf';

        // Create directory if it does not exist
        if (!is_dir($pdfDir)) {
            mkdir($pdfDir, 0775, true);
        }

        // Convert HTML to PDF
        $pdf = Pdf::loadHTML($html);
        $pdf->save($pdfPath);

        // Return the converted PDF file to the user
        return response()->download($pdfPath);
    }

    /**
     * Convert PowerPoint to HTML (simplified conversion)
     */
    private function convertPptToHtml($ppt)
    {
        $html = '<html><body>';

        foreach ($ppt->getAllSlides() as $slide) {
            $html .= '<h1>Slide</h1>';
            foreach ($slide->getShapeCollection() as $shape) {
                if ($shape instanceof \PhpOffice\PhpPresentation\Shape\RichText) {
                    $html .= '<p>' . htmlspecialchars($shape->getPlainText()) . '</p>';
                }
            }
        }

        $html .= '</body></html>';
        return $html;
    }
}
