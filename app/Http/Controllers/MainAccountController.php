<?php

namespace App\Http\Controllers;

use App\Http\Resources\SimpleListResource;
use App\Models\MainAccount;
use Illuminate\Http\Request;

class MainAccountController extends Controller
{
    //Get Main Accounts Function
    public function getMainAccounts()
    {
        $accounts = MainAccount::query()->when(request("name"),function($query,$name){
            return $query->where("name","LIKE",$name);
        })->get();

        return success(SimpleListResource::collection($accounts), null);
    }

    //Get Main Account Information Function
    public function getMainAccountInformation(MainAccount $mainAccount)
    {
        return success($mainAccount->with('subAccounts')->find($mainAccount->id),null);
    }
}