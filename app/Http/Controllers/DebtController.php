<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebtRequest;
use App\Http\Resources\DebtResource;
use App\Models\Course;
use App\Models\Student;
use App\Models\SubAccount;
use App\Models\Teacher;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\CssSelector\Node\FunctionNode;

class DebtController extends Controller
{
    public function indexStudents()
    {
        $subaccounts = SubAccount::select("id")->where("accountable_type", Student::class)
            ->when(request("name"), function ($query, $name) {
                return $query->whereHas("accountable", function ($query) use ($name) {
                    return $query->where("name","like","%" . $name . "%");
                });
            })->has("accountable");
          
        $debts = Transaction::whereNotNull("course_id")->whereHas("subaccount", function ($query) use ($subaccounts) {
            return $query->whereIn("id", $subaccounts);
        })->selectRaw("subaccount_id ,SUM(IF(type='P',amount,0)) - SUM(IF(type='E',amount,0)) as balance, course_id, max(created_at) as created_at")
            ->groupBy("subaccount_id", "course_id")->with("subaccount.accountable", "course.subject")
            ->having("balance",">",0)
            ->orderBy("created_at","desc")->paginate(20);
        return DebtResource::collection($debts);
    }
    public function indexTeachers()
    {
        $subaccounts = SubAccount::select("id")->where("accountable_type", Teacher::class)
            ->when(request("name"), function ($query, $name) {
                return $query->whereHas("accountable", function ($query) use ($name) {
                    return $query->where("name","like","%" . $name . "%");
                });
            })
            ->has("accountable")
            ->when(request("main_account"), function ($query, $value) {
                return $query->where("main_account", $value);
            });

        $debts = Transaction::whereNotNull("course_id")->whereHas("subaccount", function ($query) use ($subaccounts) {
            return $query->whereIn("id", $subaccounts);
        })->selectRaw("subaccount_id ,SUM(IF(type='E',amount,0)) - SUM(IF(type='P',amount,0)) as balance, course_id, max(created_at) as created_at")
            ->groupBy("subaccount_id", "course_id")->with("subaccount.accountable", "course.subject")
            ->having("balance",">",0)
            ->orderBy("created_at","desc")->paginate(20);
        return DebtResource::collection($debts);
    }

    public function payStudent(DebtRequest $request){
        Validator::make($request->all(),[
            "subaccount_id" => [Rule::exists("sub_accounts","id")->where("accountable_type",Student::class)]
        ],[
            "subaccount_id" => "هذا الحساب لا يعود لطالب"
        ])->validate();

        $course = Course::find($request->course_id);

        Transaction::create([
            "subaccount_id" => $request->subaccount_id,
            "type" => "E",
            "course_id" => $request->course_id,
            "amount" => $request->amount,
            "note" => $request->note ?? $course->subject->name,
        ]);
        return success(null,"debt been payed successfuly",200);
    }
    
    public function payTeacher(DebtRequest $request){
        Validator::make($request->all(),[
            "subaccount_id" => [Rule::exists("sub_accounts","id")->where("accountable_type",Teacher::class)]
        ],[
            "subaccount_id" => "هذا الحساب لا يعود لأستاذ"
        ])->validate();

        $course = Course::find($request->course_id);
        
        Transaction::create([
            "subaccount_id" => $request->subaccount_id,
            "type" => "P",
            "course_id" => $request->course_id,
            "amount" => $request->amount,
            "note" => $request->note ?? $course->subject->name,
        ]);
        
        return success(null,"debt been payed successfuly",200);
    }
}
