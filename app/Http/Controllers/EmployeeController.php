<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\SimpleListResource;
use App\Models\Employee;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //Login Function
    public function login(LoginRequest $request)
    {
        $user = User::where(['is_admin' => 0, 'username' => $request->username])->first();

        if (!$user) {
            return error("This User Not Found", null, 404);
        }

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('employee')->plainTextToken;

            return success($token, 'login successfully');
        }

        return error('incorrect password', null, 502);
    }

    //Get Profile Function
    public function profile()
    {
        $employee = Auth::guard('user')->user();
        $employee->person;
        $employee->person->employee;
        return success($employee, null);
    }

    //Add Employee Function
    public function addEmployee(EmployeeRequest $employeeRequest, PersonRequest $personRequest)
    {
   

        $employee = Employee::create([
            'name' => $personRequest->name,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
            'shift_id' => $employeeRequest->shift_id,
            'job_id' => $employeeRequest->job_title_id,
            'account_id' => $employeeRequest->user_id,
            'credentials' => $employeeRequest->credentials,
        ]);

        $employee->subaccount()->create([
            "main_account" => "الموظفين"
        ]);
     
        return success(null, 'this employee added successfully', 201);
    }

    //Edit Employee Function
    public function editEmployee(Employee $employee, EmployeeRequest $employeeRequest, PersonRequest $personRequest)
    {
        $employee->update([
            'name' => $personRequest->name,
            'phone_number' => $personRequest->phone_number,
            'birth_date' => $personRequest->birth_date,
            'job_id' => $employeeRequest->job_title_id,
            'credentials' => $employeeRequest->credentials,
            'shift_id' => $employeeRequest->shift_id,
            'account_id' => $employeeRequest->user_id
        ]);

        return success(null, 'this employee been edited successfully');
    }

    //Get Employees Function
    public function getEmployees()
    {
        
        $employees = Employee::when(request("name"),function($query,$var){
                return $query->where("name","LIKE", '%'.$var.'%');
        })->when(request("phone_number"),function($query,$var){
                return $query->where("phone_number","LIKE", '%'.$var.'%');
        })->when(request("shift"),function($query,$var){
            return $query->whereHas("shift",function($query,) use($var){
                return $query->where("name","LIKE", '%'.$var.'%');
            });
        })->when(request("job_title"),function($query,$var){
            return $query->whereHas("jobTitle",function($query,) use($var){
                return $query->where("name","LIKE", '%'.$var.'%');
            });
        })->when(request("trashed"), function ($query, $var) {
            return $query->onlyTrashed();
        })->with('shift', 'user',"jobTitle")->paginate(20);
        return (new EmployeeCollection($employees));
    }

    public function getUnattached(){
        $employees =  Employee::when(request("name"),function($query,$var){
                return $query->where("name","LIKE", '%'.$var.'%');
            })
            ->whereDoesntHave("user")->paginate(20);
        return SimpleListResource::collection($employees);
    } 
    //Get Employee Information Function
    public function getEmployeeInformation(Employee $employee)
    {
        $employee->load([ 'user','shift',"jobTitle"]);
        return success(new EmployeeResource($employee), null);
    }
    public function getNames(){
        $employees = Employee::when(request("name"), function ($query, $name) {
            return $query->where("name", "LIKE", '%' . $name . '%');
        })->paginate(20);
        return success(SimpleListResource::collection($employees), null);
    }

    //Delete Employee Function
    public function deleteEmployee(Employee $employee)
    {
        $employee->user()->delete();
        $employee->delete();
        return success(null, 'this employee deleted successfully',204);
    }

    public function restoreEmployee(Employee $employee)
    {
        $employee->restore();
        return success(null, 'this employee been restored successfully');
    }

}