<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //Add Transaction Function
    public function addTransaction(TransactionRequest $transactionRequest)
    {
        Transaction::create([
            'subaccount_id' => $transactionRequest->subaccount_id,
            'account' => $transactionRequest->account,
            'type' => $transactionRequest->type,
            'amount' => $transactionRequest->amount,
            'note' => $transactionRequest->note,
        ]);

        return success(null, 'this transaction added successfully', 201);
    }

    //Edit Transaction Functuion
    public function editTransaction(Transaction $transaction, TransactionRequest $transactionRequest)
    {
        $transaction->update([
            'subaccount_id' => $transactionRequest->subaccount_id,
            'account' => $transactionRequest->account,
            'type' => $transactionRequest->type,
            'amount' => $transactionRequest->amount,
            'note' => $transactionRequest->note,
        ]);

        return success(null, 'this transaction updated successfully');
    }

    //Delete Transaction Function
    public function deleteTransaction(Transaction $transaction)
    {
        $transaction->delete();

        return success(null, 'this transaction deleted successfully');
    }

    //Get Transactions Function
    public function getTransactions()
    {
        $transactions = Transaction::with(['subaccount','subaccount.mainaccount'])->get();

        return success($transactions, null);
    }

    //Get Transaction Information Function
    public function getTransactionInformation(Transaction $transaction)
    {
        return success($transaction->with(['subaccount','subaccount.mainaccount'])->find($transaction->id), null);
    }
}