<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubAccountRequest;
use App\Http\Resources\SimpleListResource;
use App\Http\Resources\SubAccountResource;
use App\Models\AdditionalSubAccount;
use App\Models\Employee;
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
    public function editSubAccount(SubAccount $subAccount, SubAccountRequest $request)
    {
        $subAccount->update([
            'main_account' => $request->name,
        ]);
        $subAccount->subaccount->update([
            "main_account" => $request->main_account,
        ]);
        return success(null, 'this subaccount updated successfully');
    }

    public function getAddedSubAccounts()
    {
        $subAccounts = SubAccount::when(request("name"), function ($query, $name) {
            return $query->whereHas("accountable",function($query) use($name) {
                return $query->where("name", "LIKE", "%" . $name . "%");
            });
        })->where("accountable_type",AdditionalSubAccount::class)
        ->with("accountable")->paginate(20);
        return SubAccountResource::collection($subAccounts);
    }
    public function getEmployeeSubAccounts()
    {
        $subAccounts = SubAccount::when(request("name"), function ($query, $name) {
            return $query->whereHas("accountable",function($query) use($name) {
                return $query->where("name", "LIKE", "%" . $name . "%");
            });
        })->where("accountable_type",Employee::class)
        ->with("accountable")->paginate(20);
        return SubAccountResource::collection($subAccounts);
    }

    

    //Get Sub Account Information Function
    public function getSubAccountInformation(SubAccount $subAccount)
    {
        $subAccount->load("accountable");
        return new SubAccountResource($subAccount);
    }

    //Delete Sub Account Function
    public function deleteSubAccount(SubAccount $subAccount)
    {
      
        $subAccount->accountable?->delete();
        $subAccount->delete();
        return success(null, 'this subaccount deleted successfully', 204);
    }
}
