<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        return error('incorrect password', null, 502);
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
            return error("error in confirming password", null, 502);
        }

        return error("incorrect password", null, 502);
    }

    //Logout Function
    public function logout()
    {
        Auth::guard('user')->user()->tokens()->delete();

        return success(null, 'logout successfully');
    }
}