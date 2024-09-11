<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Dompdf\Dompdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use Smalot\PdfParser\Parser;
use setasign\Fpdi\Fpdi;
use App\Services\WalletService;


class PdfToWordController extends ConversionController
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        // Configure PDF renderer
        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        Settings::setPdfRendererPath(base_path('vendor/dompdf/dompdf'));
         $this->walletService = $walletService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pdftool.pdftoword');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function convert(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'conversionType' => 'required|string',
        ]);

        // Handle file upload
        $uploadedFile = $request->file('file');
        $originalFilePath = $uploadedFile->store('uploads');

        // Perform conversion based on the selected conversion type
        $convertedFilePath = $this->performConversion($originalFilePath, $request->conversionType);

        // Debit wallet before downloading the file
        $debitStatus = $this->debitWallet();

        if ($debitStatus['success']) {
            // Generate file download response
            return $this->downloadConvertedFile($convertedFilePath);
        } else {
            // If debiting fails, return an error response
            return redirect()->back()->with('error', $debitStatus['message']);
        }
    }

    private function performConversion($filePath, $type)
    {
        switch ($type) {
            case 'pdf_to_doc':
                return $this->convertPdfToDoc($filePath);
            default:
                throw new \Exception("Conversion type not supported.");
        }
    }

    private function convertPdfToDoc($filePath)
    {
        $parser = new Parser();
        $pdf = $parser->parseFile(Storage::path($filePath));
        $text = $pdf->getText();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText($text);

        // Ensure the 'converted' directory exists
        $convertedDir = storage_path('app/converted');
        if (!File::exists($convertedDir)) {
            File::makeDirectory($convertedDir, 0755, true);
        }

        // Construct the full file path
        $docFilePath = $convertedDir . '/' . pathinfo($filePath, PATHINFO_FILENAME) . '.docx';

        // Save the file and return the relative path
        $phpWord->save($docFilePath, 'Word2007');
        return 'converted/' . pathinfo($filePath, PATHINFO_FILENAME) . '.docx';
    }

    private function downloadConvertedFile($filePath)
    {
        $fileContents = Storage::get($filePath);
        $fileName = basename($filePath);

        return Response::make($fileContents, 200, [
            'Content-Type' => Storage::mimeType($filePath),
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]);
    }

    private function debitWallet()
    {
        $user = auth()->user();
        try {
            $this->walletService->debit($user->wallet, 1, 'Withdrew funds in Pdf To Doc');
            return ['success' => true, 'message' => 'Funds withdrawn successfully'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

}
