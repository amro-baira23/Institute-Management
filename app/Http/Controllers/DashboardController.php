<?php

namespace App\Http\Controllers;

use App\Models\SubAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    //Get last 6 monthes earnings
    public function getEarnings(){
        $dates = [];
        $accounts = SubAccount::where('main_account', 'الطلاب')->get();
        
        for($i=0;$i<6;$i++){
            $dates[$i] = Carbon::now()->subMonths($i)->format('Y-m-d');           
        }

        foreach($accounts as $account){
            $transactions = Transaction::where('subaccount_id',$account->id)->where('type','E');
        }
    }
}