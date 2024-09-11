<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class htmltopdfController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pdftool.htmltopdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'html_file' => 'required|mimes:html|max:2048', // Validate HTML file with a max size of 2MB
        ]);

        // Store the uploaded HTML file temporarily
        $path = $request->file('html_file')->storeAs('uploads', 'uploaded-file.html');

        // Get the content of the HTML file
        $htmlContent = Storage::get($path);

        // Generate the PDF from HTML content
        $pdf = Pdf::loadHTML($htmlContent);

        // Delete the uploaded file after use
        Storage::delete($path);

        // Download the generated PDF
        return $pdf->download('converted-file.pdf');
    }
}
