<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Resources\SimpleListResource;
use App\Http\Resources\UserResource;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{


    public function index()
    {
        $users = User::with("role")->when(request("name"), function ($query, $var) {
            return $query->where("username", "LIKE", '%' . $var . '%');
        })->when(request("trashed") == true, function ($query) {
            return $query->onlyTrashed();
        })->when(request("role"), function ($query, $name) {
            return $query->whereHas("role", function ($query,) use ($name) {
                return $query->where("name", "LIKE", '%' . $name . '%');
            });
        })->paginate(20);
        return UserResource::collection($users);
    }

    public function indexUnattached()
    {
        $users = User::whereDoesntHave("employee")->when(request("name"), function ($query, $var) {
            return $query->where("username", "LIKE", '%' . $var . '%');
        })->paginate(20);
        return SimpleListResource::collection($users);
    }
    public function get(User $user)
    {
        $user->load(["activities" => function ($query) {
            return $query->orderby("id", "desc")->take(5);
        }, "role", "employee"]);
        return new UserResource($user);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "username" => ["required", "max:15", "alpha_num", "unique:users,username"],
            "password" => ["required", Password::min(6)->numbers()->letters()],
            "role_id" => ["required", "exists:roles,id"],
            "employee_id" => ["present", "nullable", Rule::exists("employees", "id")->where("account_id", null),],
        ], [
            "required" => "هذا الحقل مطلوب",
            "present" => "هذا الحقل مطلوب",
            "password.min" => "على كلمة السر ان لا تقل عن 6 محارف",
            "password.numbers" => "على كلمة السر ان تحتوي على رقم واحد على الأقل",
            "password.letters" => "على كلمة السر ان تحتوي على حرف واحد على الأقل",
            "username.max" => "على اسم المستخدم ان لا يزيد عن 15 محرف",
            "username.unique" => "اسم المستخدم المدخل مأخوذ",
            "employee_id.exists" => "الموظف المدخل غير موجود او لديه حساب بالفعل",
            "exists" => "المعرف المدخل غير موجود في قاعدة البيانات"
        ]);
        $validator->validate();
        $valid = $validator->safe();
        $valid["password"] = Hash::make($valid["password"]);
        $user = User::create($valid->except("employee_id"));
        Employee::find($valid["employee_id"])?->update(["account_id" => $user->id]);
        return success(null, "تم اضافة حساب بنجاح", 201);
    }

    public function edit(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            "role_id" => ["required", "exists:roles,id"],
            "employee_id" => ["nullable", Rule::exists("employees", "id")->where(function ($query) use ($user) {
                return $query->where("account_id", null)->orWhere("account_id", $user->id);
            }),],
        ], [
            "required" => "هذا الحقل مطلوب",
            "present" => "هذا الحقل مطلوب",
            "employee_id.exists" => "الموظف المدخل غير موجود او لديه حساب بالفعل",
            "exists" => "المعرف المدخل غير موجود في قاعدة البيانات"
        ]);
        $validator->validate();
        $valid = $validator->safe();
        $user->update($valid->except("employee_id"));
        $user->employee?->update(["account_id" => null]);
        Employee::find($valid["employee_id"])?->update(
            ["account_id" => $user->id]
        );
        return success(new UserResource($user->load("role", "employee")), "تم تعديل الحساب بنجاح", 200);
    }

    public function delete(User $user)
    {
        $user->employee?->update(["account_id"=>null]);
        $user->delete();

        return response(null, 204);
    }

    public function restore(User $user)
    {
        $user->restore();
        return success(new UserResource($user), "تم استعادة الحساب بنجاح", 200);
    }
}
