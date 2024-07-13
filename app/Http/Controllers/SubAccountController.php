<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubAccountRequest;
use App\Http\Resources\SimpleListResource;
use App\Http\Resources\SubAccountResource;
use App\Models\AdditionalSubAccount;
use App\Models\Enrollment;
use App\Models\SubAccount;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubAccountController extends Controller
{
    //Add Sub Account Function
    public function addSubAccount(SubAccountRequest $request)
    {
        $subaccount = AdditionalSubAccount::create([
            'name' => $request->name,
        ]);
        $subaccount->subaccount()->create([
            "main_account" => $request->main_account,
        ]);
        return success(null, 'this subaccount added successfully', 201);
    }

    //Edit Sub Account Function
    public function editSubAccount(AdditionalSubAccount $subAccount, SubAccountRequest $request)
    {
        $subAccount->update([
            'name' => $request->name,
        ]);
        $subAccount->subaccount->update([
            "main_account" => $request->main_account,
        ]);
        return success(null, 'this subaccount updated successfully');
    }

    public function getSubAccounts()
    {
        $subAccounts = AdditionalSubAccount::when(request("name"), function ($query, $name) {
            return $query->where("name", "LIKE", "%" . $name . "%");
        })->with("subaccount")->paginate(20);
        return SimpleListResource::collection($subAccounts);
    }

    

    //Get Sub Account Information Function
    public function getSubAccountInformation(AdditionalSubAccount $subAccount)
    {
        $subAccount->load("subaccount");
        return new SubAccountResource($subAccount);
    }

    //Delete Sub Account Function
    public function deleteSubAccount(AdditionalSubAccount $subAccount)
    {
        $subAccount->subaccount?->delete();
        $subAccount->delete();

        return success(null, 'this subaccount deleted successfully', 204);
    }
}
