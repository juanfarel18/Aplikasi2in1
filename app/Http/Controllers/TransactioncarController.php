<?php
namespace App\Http\Controllers;

use App\Models\Transactioncar;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactioncarController extends Controller
{
    public function index()
    {
        // Ambil transaksi user yang login
        $transactions = Transactioncar::where('user_id', Auth::id())
                            ->orderBy('date', 'desc')
                            ->get();

        return view('transactions.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transactioncar::findOrFail($id);

        return view('transactions.show', compact('transaction'));
    }
}
