<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //Add Transaction Function
    public function addTransaction(TransactionRequest $transactionRequest)
    {
        Transaction::create([
            'subaccount_id' => $transactionRequest->subaccount_id,
            'course_id' => $transactionRequest->course_id,
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
            'course_id' => $transactionRequest->course_id,
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
        $transactions = Transaction::with("subaccount","subaccount.accountable")
        ->when(request("subaccount"), function ($query, $var) {
            return $query->whereHas("subaccount",function ($query) use ($var){
                return $query->whereHas("accountable",function($query) use ($var){
                    return $query->where("name","like","%" . $var . "%");
                });
            });
        })->when(request("main_account"), function ($query, $var) {
            return $query->whereHas("subaccount",function ($query) use ($var){
                    return $query->where("main_account","like","%" . $var . "%");
            });
        })->when(request("type"), function ($query, $var) {
            return $query->where("type",$var);
        })->when(request("date"), function ($query, $var) {
            return $query->where("created_at","like","%" . $var . "%");
        })->orderBy("id","desc")->paginate(1000);

        return TransactionResource::collection($transactions);
    }

    //Get Transaction Information Function
    public function getTransactionInformation(Transaction $transaction)
    {
        $transaction->load("subaccount.accountable");
        return new TransactionResource($transaction);
    }
}