<?php

namespace App\Http\Controllers;

use App\Models\MainAccount;
use Illuminate\Http\Request;

class MainAccountController extends Controller
{
    //Get Main Accounts Function
    public function getMainAccounts()
    {
        $accounts = MainAccount::query()->when(request("name"),function($query,$name){
            return $query->where("name",$name);
        })->get();
        return success($accounts, null);
    }

    //Get Main Account Information Function
    public function getMainAccountInformation(MainAccount $mainAccount)
    {
        return success($mainAccount->with('subAccounts')->find($mainAccount->id),null);
    }
}