<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\IOFactory;

class exceltopdfController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pdftool.exceltopdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx,csv|max:2048',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $worksheet = $spreadsheet->getActiveSheet();

        $html = '<table border="1" style="width:100%; border-collapse: collapse;">';
        foreach ($worksheet->getRowIterator() as $row) {
            $html .= '<tr>';
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            foreach ($cellIterator as $cell) {
                $html .= '<td>' . htmlspecialchars($cell->getValue()) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';

        $pdf = Pdf::loadHTML($html);
        return $pdf->download('excel-to-pdf.pdf');
    }
}
