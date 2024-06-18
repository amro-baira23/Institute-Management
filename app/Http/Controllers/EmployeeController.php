<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\DayOfWeek;
use App\Models\Employee;
use App\Models\Person;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
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
        $person = Person::create([
            'name' => $personRequest->name,
            'father_name' => $personRequest->father_name,
            'phone_number' => $personRequest->phone_number,
            'mother_name' => $personRequest->mother_name,
            'gender' => $personRequest->gender,
            'birth_date' => $personRequest->birth_date,
            'type' => 'E',
        ]);

        $employee = Employee::create([
            'person_id' => $person->id,
            'shift_id' => $employeeRequest->shift_id,
            'job_id' => $employeeRequest->job_title_id,
            'account_id' => $employeeRequest->user_id,
            'credentials' => $employeeRequest->credentials,
        ]);
     
        return success(null, 'this employee added successfully', 201);
    }

    //Edit Employee Function
    public function editEmployee(Employee $employee, EmployeeRequest $employeeRequest, PersonRequest $personRequest)
    {
        $employee->person()->update([
            'name' => $personRequest->name,
            'father_name' => $personRequest->father_name,
            'phone_number' => $personRequest->phone_number,
            'mother_name' => $personRequest->mother_name,
            'gender' => $personRequest->gender,
            'birth_date' => $personRequest->birth_date,
        ]);

        $schedule = Schedule::create([
            'start' => $employeeRequest->start,
            'end' => $employeeRequest->end,
        ]);
        $days = explode(',', $employeeRequest->days);

        foreach ($days as $day) {
            DayOfWeek::create([
                'schedule_id' => $schedule->id,
                'day' => $day
            ]);
        }

        $employee->update([
            'role_id' => $employeeRequest->role_id,
            'job_name' => $employeeRequest->job_name,
            'credentials' => $employeeRequest->credentials,
            'salary_amount' => $employeeRequest->salary_amount
        ]);

        return success(null, 'this employee added successfully');
    }

    //Get Employees Function
    public function getEmployees()
    {
        $employees = Employee::with('person', 'shift', 'user',"jobTitle")->get();
        return success(EmployeeResource::collection($employees), null);
    }

    //Get Employee Information Function
    public function getEmployeeInformation(Employee $employee)
    {
        $employee = $employee->with(['person', 'user','shift'])->find($employee->id);
        return success(new EmployeeResource($employee), null);
    }

    //Delete Employee Function
    public function deleteEmployee(Employee $employee)
    {
        if ($employee->person->user) {
            $employee->person->user->delete();
        }
        
        $employee->person->delete();
        $employee->delete();
        return success(null, 'this employee deleted successfully',204);
    }
}