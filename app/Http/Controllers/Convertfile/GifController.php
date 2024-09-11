<?php

namespace App\Http\Controllers\Convertfile;

use App\Services\GifToPdfService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GifController extends Controller
{
    protected $gifToPdfService;

    public function __construct(GifToPdfService $gifToPdfService)
    {
        $this->gifToPdfService = $gifToPdfService;
    }

    public function convert(Request $request)
    {
        $request->validate([
            'gif_file' => 'required|file|mimes:gif'
        ]);

        $gifFile = $request->file('gif_file');
        $pdfPath = storage_path('app/public/converted.pdf');

        $this->gifToPdfService->convert($gifFile->getRealPath(), $pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(true);
    }
}
