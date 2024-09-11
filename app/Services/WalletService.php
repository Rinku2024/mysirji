<?php 

namespace App\Services;

use App\Models\Wallet;
use App\Models\Transaction;

class WalletService
{
    public function credit(Wallet $wallet, $amount, $description = null)
    {
        $wallet->balance += $amount;
        $wallet->save();

        $this->recordTransaction($wallet, $amount, 'credit', $description);
    }

    public function debit(Wallet $wallet, $amount, $description = null)
    {
        if ($wallet->balance >= $amount) {
            $wallet->balance -= $amount;
            $wallet->save();

            $this->recordTransaction($wallet, $amount, 'debit', $description);
        } else {
            throw new \Exception('Insufficient funds');
        }
    }

    protected function recordTransaction(Wallet $wallet, $amount, $type, $description)
    {
        Transaction::create([
            'wallet_id'   => $wallet->id,
            'amount'      => $amount,
            'type'        => $type,
            'description' => $description,
        ]);
    }
}




