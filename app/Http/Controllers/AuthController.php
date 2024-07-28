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
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    //Login Function
    public function login(LoginRequest $request)
    {
        $user = User::where(['username' => $request->username])->first();

        if (!$user) {
            return error("User Not Found", null, 404);
        }

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('admin')->plainTextToken;
            $data["token"] = $token;
            $data["user"] = new UserResource($user);
            return success($token, 'login successfully');
        }

        return error('incorrect password', null, 422);
    }

    //Profile Function
    public function profile()
    {
        $user = Auth::guard('user')->user();
       
        return success(new UserResource($user), null, 200);
    }

    //Edit Profile Fuction
    public function editProfile(Request $request)
    {
        $admin = Auth::guard('user')->user();


        $validator = Validator::make($request->all(), [
            'username' => ["required","alpha_dash","max:15",Rule::unique("users","username")->ignore($admin->id)],
            "old_password" => ["required", Password::min(6)->numbers()->letters()],
            "password" => [],
            "confirm_password" => [],
        ], [
            "required" => "هذا الحقل مطلوب",
            "alpha_dash" => "اسم المستخدم يجب ان يحتوي احرف وارقام فقط",
            "password.min" => "على كلمة السر ان لا تقل عن 5 محارف",
            "password.numbers" => "على كلمة السر ان تحتوي على رقم واحد على الأقل",
            "password.letters" => "على كلمة السر ان تحتوي على حرف واحد على الأقل",
            "username.max" => "على اسم المستخدم ان لا يزيد عن 15 محرف",
            "username.min" => "على اسم المستخدم ان لا يقل عن 5 محارف",
            "username.unique" => "اسم المستخدم المدخل مأخوذ",
        ]);
        $validator->validate();
        
        if (!Hash::check($request->old_password, $admin->password)) 
            return error("كلمة السر المدخلة خاطئة", null, 422);
        
        if($request->password){
            if ($request->password !== $request->confirm_password) 
                return error("خطأ في حقل تأكيد كلمة السر", null, 422);
            $data["password"] = Hash::make($request->password);
        }
        
        $data["username"] = $request->username;
    
        $admin->update($data);

        return success(null, 'username updated successfully');
    }

  
    //Logout Function
    public function logout()
    {
        Auth::guard('user')->user()->tokens()->delete();

        return success(null, 'logout successfully');
    }
}
