<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubAccountRequest;
use App\Http\Resources\SimpleListResource;
use App\Models\SubAccount;
use Illuminate\Http\Request;

class SubAccountController extends Controller
{
    //Add Sub Account Function
    public function addSubAccount(SubAccountRequest $request)
    {
        SubAccount::create([
            'main_account_id' => $request->main_account_id,
            'name' => $request->name,
        ]);

        return success(null, 'this sub account added successfully', 201);
    }

    //Edit Sub Account Function
    public function editSubAccount(SubAccount $subAccount, SubAccountRequest $request)
    {
        $subAccount->update([
            'main_account_id' => $request->main_account_id,
            'name' => $request->name,
        ]);

        return success(null, 'this sub account updated successfully');
    }

    //Get Sub Accounts Function
    public function getSubAccounts()
    {
        $subAccounts = SubAccount::query()->when(request("name"),function($query,$name){
            return $query->where("name","LIKE","%".$name."%");
        })->get();
        return success(SimpleListResource::collection($subAccounts), null);
    }

    //Get Sub Account Information Function
    public function getSubAccountInformation(SubAccount $subAccount)
    {
        return success($subAccount, null);
    }

    //Delete Sub Account Function
    public function deleteSubAccount(SubAccount $subAccount){
        $subAccount->delete();

        return success(null,'this sub account deleted successfully');
    }
}