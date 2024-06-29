<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password ;

class UserController extends Controller
{
    //Login Function
    public function login(LoginRequest $request)
    { 
        $user = User::where(['username' => $request->username])->first();
        
        if (!$user) {
            return error("This User Not Found", null, 404);
        }

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('admin')->plainTextToken;

            return success($token, 'login successfully');
        }

        return error('incorrect password', null, 422);
    }

    //Profile Function
    public function profile()
    {
        $user = Auth::guard('user')->user();
        $user->person;
        if(!$user->is_admin){
            $user->person->employee;
        }
        return success($user, null, 200);
    }

    //Edit Profile Fuction
    public function editProfile(Request $request)
    {
        $request->validate([
            'username' => 'required'
        ]);

        $admin = Auth::guard('user')->user();
        $admin->update([
            'username' => $request->username
        ]);

        return success(null, 'username updated successfully');
    }

    //Edit Password Function
    public function editPassword(PasswordRequest $request)
    {
        $admin = Auth::guard('user')->user();

        if (Hash::check($request->password, $admin->password)) {
            if ($request->new_password === $request->confirm_password) {
                $admin->update([
                    'password' => Hash::make($request->new_password),
                ]);

                return success(null, "your password updated successfully");
            }
            return error("error in confirming password", null, 422);
        }

        return error("incorrect password", null, 422);
    }

    //Logout Function
    public function logout()
    {
        Auth::guard('user')->user()->tokens()->delete();

        return success(null, 'logout successfully');
    }

    public function index(){
        $users = User::with("role")->get();
        return UserResource::collection($users);
    }

    public function get(User $user){
        return new UserResource($user);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "username" => ["required", "max:15", "alpha_num","unique:users,username"],
            "password" => ["required",Password::min(6)->numbers()->letters()],
            "role_id" => ["required","exists:roles,id"],
            "person_id" => ["exists:persons,id",],
        ],[
            "required" => "هذا الحقل مطلوب",
            "password.min" => "على كلمة السر ان لا تقل عن 5 محارف",
            "password.numbers" => "على كلمة السر ان تحتوي على رقم واحد على الأقل",
            "password.letters" => "على كلمة السر ان تحتوي على حرف واحد على الأقل",
            "username.max" => "على اسم المستخدم ان لا يزيد عن 15 محرف",
            "username.unique" => "اسم المستخدم المدخل مأخوذ",
            "exists" => "المعرف المدخل غير موجود في قاعدة البيانات"
        ]);
        $validator->validate();
        $valid = $validator->validated();
        $valid["password"] = Hash::make($valid["password"]);
        $user = User::create($valid);
        return success(new UserResource($user),"تم اضافة حساب بنجاح",201);
    }

    public function edit(Request $request, User $user){
        $validator = Validator::make($request->all(),[
            "role_id" => ["required","exists:roles,id"],
        ],[
            "required" => "هذا الحقل مطلوب",
            "exists" => "المعرف المدخل غير موجود في قاعدة البيانات"
        ]);
        $validator->validate();
        $valid = $validator->validated();
        $user->update($valid);
        return success(new UserResource($user),"تم تعديل الحساب بنجاح",200);

    }

    public function delete(User $user){
        $user->delete();
        return response(null,204);
    }
}