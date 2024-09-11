<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use PDF;

class jpgtopdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.pdftool.jpgtopdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pdftool.jpgtopdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg|max:8000',
        ]);

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        // Convert JPG to PDF
        $pdf = new Fpdi();
        $pdf->AddPage();
        $pdf->Image(public_path('storage/' . $filePath), 0, 0, 210, 297); // Adjust the image size if needed
        $outputPath = 'pdf/' . pathinfo($fileName, PATHINFO_FILENAME) . '.pdf';
        Storage::put('public/' . $outputPath, $pdf->Output('S'));

        return response()->download(public_path('storage/' . $outputPath))->deleteFileAfterSend(true);
    }
}
