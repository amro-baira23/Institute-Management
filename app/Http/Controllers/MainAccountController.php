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

        $main_accounts = ['المصاريف', 'الإيرادات',  'الصندوق', 'رأس المال', 'الموظفين'];

        return success($main_accounts, null);
    }

   
}