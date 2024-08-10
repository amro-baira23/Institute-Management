<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //Main Accounts Report
    public function getMainReport()
    {
        $transactions = Transaction::with('subaccount', 'course')->get();
        foreach ($transactions as $transaction) {
            return success($transaction->subaccount->accountable_type::find($transaction->subaccount->accountable_id), null);
        }

        return success($transactions, null);
    }
}