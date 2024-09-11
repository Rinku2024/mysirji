<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\File;
use Dompdf\Dompdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use Smalot\PdfParser\Parser;
use setasign\Fpdi\Fpdi;

class ConversionController extends Controller
{
    public function __construct()
    {
        // Configure PDF renderer
        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        Settings::setPdfRendererPath(base_path('vendor/dompdf/dompdf'));
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

        // Generate file download response
        return $this->downloadConvertedFile($convertedFilePath);
    }

    private function performConversion($filePath, $type)
    {
        switch ($type) {
            case 'html_to_pdf':
                return $this->convertHtmlToPdf($filePath);
            case 'jpg_to_pdf':
                return $this->convertJpgToPdf($filePath);
            case 'doc_to_pdf':
                return $this->convertDocToPdf($filePath);
            case 'pdf_to_doc':
                return $this->convertPdfToDoc($filePath);
            default:
                throw new \Exception("Conversion type not supported.");
        }
    }

    private function convertHtmlToPdf($filePath)
    {
        $htmlContent = Storage::get($filePath);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();
        $pdfFilePath = 'converted/' . pathinfo($filePath, PATHINFO_FILENAME) . '.pdf';
        Storage::put($pdfFilePath, $output);

        return $pdfFilePath;
    }

    private function convertJpgToPdf($filePath)
    {
        $imagePath = Storage::path($filePath);
        $pdfFilePath = 'converted/' . pathinfo($filePath, PATHINFO_FILENAME) . '.pdf';

        $pdf = new Fpdi();
        $pdf->AddPage();
        $pdf->Image($imagePath, 10, 10, 190); // Adjust dimensions and position as needed
        $pdf->Output('F', Storage::path($pdfFilePath));

        return $pdfFilePath;
    }

    private function convertDocToPdf($filePath)
    {
        $phpWord = \PhpOffice\PhpWord\IOFactory::load(Storage::path($filePath));
        $pdfFilePath = 'converted/' . pathinfo($filePath, PATHINFO_FILENAME) . '.pdf';
        $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
        $pdfWriter->save(Storage::path($pdfFilePath));

        return $pdfFilePath;
    }

    private function convertPdfToDoc($filePath)
    {
        $parser = new Parser();
        $pdf = $parser->parseFile(Storage::path($filePath));
        $text = $pdf->getText();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText($text);
        $docFilePath = 'converted/' . pathinfo($filePath, PATHINFO_FILENAME) . '.docx';
        $phpWord->save(Storage::path($docFilePath), 'Word2007');

        return $docFilePath;
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

   public function uploadPdf(Request $request)
{
    $request->validate([
        'pdfFile' => 'required|mimes:pdf|max:10000',
    ]);

    $file = $request->file('pdfFile');
    $filename = 'uploaded_' . time() . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs('public/pdfs', $filename);

    return response()->json([
        'status' => 'success',
        'url' => Storage::url('pdfs/' . $filename)
    ]);
}


    public function updatePdf(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf',
        ]);

        $file = $request->file('file');
        $fileName = 'edited_' . time() . '.pdf';
        $path = $file->storeAs('public/pdfs', $fileName);

        return response()->json(['path' => Storage::url($path), 'status' => 'success']);
    }
}
