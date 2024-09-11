<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\WalletService;

class WalletController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    public function index()
{
    $user = auth()->user();

    // Check if the user has a wallet, if not create one
    if (!$user->wallet) {
        $user->wallet()->create(['balance' => 0]);
    }

    return view('wallet.index', ['wallet' => $user->wallet]);
}

    public function addFunds(Request $request)
    {
        $user = auth()->user();
        $this->walletService->credit($user->wallet, $request->input('amount'), 'Added funds');
        return redirect()->route('wallet.index')->with('success', 'Funds added successfully');
    }

    public function withdrawFunds(Request $request)
    {
        $user = auth()->user();
        try {
            $this->walletService->debit($user->wallet, $request->input('amount'), 'Withdrew funds');
            return redirect()->route('wallet.index')->with('success', 'Funds withdrawn successfully');
        } catch (\Exception $e) {
            return redirect()->route('wallet.index')->with('error', $e->getMessage());
        }
    }

    // app/Http/Controllers/UserController.php

    public function checkBalance()
    {
        $user = auth()->user()->wallet; // Or retrieve the user from session
        return response()->json(['success' => true, 'balance' => $user->balance]);
    }

    public function deductBalance(Request $request)
    {
        $user = auth()->user()->wallet(); // Or retrieve the user from session

        if ($user->balance >= $request->amount) {
            $user->balance -= $request->amount;
            $user->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }


    
}

