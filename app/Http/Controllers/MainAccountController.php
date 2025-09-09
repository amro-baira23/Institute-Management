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

        $main_accounts = ['المصاريف', 'الإيرادات', 'الطلاب', 'الأساتذة', 'الصندوق', 'رأس المال', 'الموظفين'];
        
        $i = 0;
        foreach ( $main_accounts as $ms){
            $main_accounts[$i++] = ["id" => $i, "name" => $ms];
        }

        return success($main_accounts, null);
    }

   
}