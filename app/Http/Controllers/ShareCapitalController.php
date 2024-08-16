<?php

namespace App\Http\Controllers;

use App\Models\SubAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ShareCapitalController extends Controller
{
    //Add Share Capital Function
    public function addShareCapital(Request $request)
    {
        $request->validate([
            'capital' => 'required|integer',
        ]);
        $SubAccount = SubAccount::where('main_account', 'رأس المال')->first();
        if (!$SubAccount)
            $SubAccount = SubAccount::create([
                'main_account' => 'رأس المال',
            ]);

        Transaction::create([
            'subaccount_id' => $SubAccount->id,
            'type' => 'P',
            'amount' => $request->capital,
            'note' => 'رأس المال',
        ]);

        return success(null, 'this share capital added successfully');
    }

    //Add Revenues Function
    public function addRevenues(Request $request)
    {
        $request->validate([
            'revenue' => 'required|integer',
        ]);
        $SubAccount = SubAccount::where('main_account', 'الإيرادات')->first();
        if (!$SubAccount)
            $SubAccount = SubAccount::create([
                'main_account' => 'الإيرادات',
            ]);

        Transaction::create([
            'subaccount_id' => $SubAccount->id,
            'type' => 'E',
            'amount' => $request->revenue,
            'note' => 'الإيرادات',
        ]);

        return success(null, 'this revenues added successfully');
    }

    //Add Expenses Function
    public function addExpenses(Request $request)
    {
        $request->validate([
            'expense' => 'required|integer',
        ]);
        $SubAccount = SubAccount::where('main_account', 'المصاريف')->first();
        if (!$SubAccount)
            $SubAccount = SubAccount::create([
                'main_account' => 'المصاريف',
            ]);

        Transaction::create([
            'subaccount_id' => $SubAccount->id,
            'type' => 'P',
            'amount' => $request->expense,
            'note' => 'المصاريف',
        ]);

        return success(null, 'this expenses added successfully');
    }

    //Add Box Function
    public function addBox(Request $request)
    {
        $request->validate([
            'box' => 'required|integer',
        ]);
        $SubAccount = SubAccount::where('main_account', 'الصندوق')->first();
        if (!$SubAccount)
            $SubAccount = SubAccount::create([
                'main_account' => 'الصندوق',
            ]);

        Transaction::create([
            'subaccount_id' => $SubAccount->id,
            'type' => 'E',
            'amount' => $request->box,
            'note' => 'الصندوق',
        ]);

        return success(null, 'this expenses added successfully');
    }
}
