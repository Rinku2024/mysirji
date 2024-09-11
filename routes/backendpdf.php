<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocxtopdfController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PdfToWordController;
use App\Http\Controllers\DocumentPdfToWordController;
use App\Http\Controllers\jpgtopdfController;
use App\Http\Controllers\htmltopdfController;
use App\Http\Controllers\exceltopdfController;
use App\Http\Controllers\PowerpointToPdfController;
use App\Http\Controllers\PdfToExcelController;


Route::middleware(['auth'])->group(function () {
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/add-funds', [WalletController::class, 'addFunds'])->name('wallet.addFunds');
    Route::post('/wallet/withdraw-funds', [WalletController::class, 'withdrawFunds'])->name('wallet.withdrawFunds');
    // routes/web.php
    Route::get('/addBalancePage', [WalletController::class, 'addBalancePage'])->name('addBalancePage');
    Route::get('/check-balance', [WalletController::class, 'checkBalance'])->name('checkBalance');
    Route::post('/deduct-balance', [WalletController::class, 'deductBalance'])->name('deductBalance');

});

Route::post('/convert-pdf-to-word', [PdfToWordController::class, 'convert']);

Route::post('/pdf-to-word-convert', [PdfToWordController::class, 'convert'])->name('pdf.to.word');

Route::resource("docx-to-pdf",DocxtopdfController::class);
Route::post('/convert-to-pdf', [DocumentController::class, 'convert'])->name('convert-to-pdf');

Route::resource("jpg-to-pdf",jpgtopdfController::class);

Route::resource('html-to-pdf', htmltopdfController::class)->only(['create', 'store']);

Route::resource('excel-to-pdf', exceltopdfController::class);

Route::get('powerpoint-to-pdf', [PowerpointToPdfController::class, 'create'])->name('powerpoint-to-pdf.create');
Route::post('powerpoint-to-pdf', [PowerpointToPdfController::class, 'store'])->name('powerpoint-to-pdf.store');

Route::resource('pdf-to-excel', PdftoExcelController::class);

Route::resource("pdf-to-jpg",pdftojpgController::class);

Route::resource("pdf-to-powerpoint",pdftopowerpointController::class);

Route::resource("pdf-to-word",pdftowordController::class);



