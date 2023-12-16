<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class UserContoller extends Controller
{

    public function updatePassword(Request $request)
    {

        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => [
                'required',
                'confirmed',
            ],
        ]);

        if ($request->input('password') == $request->input('confirmPassowrd')) {
            auth()->user()->update([
                'password' => Hash::make($request->input('password')),
            ]);
            return ['msg' => 'Successfully Updated Password'];
        } else {
            return ['msg' => 'Password Field not Match to Confrim Password'];
        }

    }
    public function setting(){}
    public function profileImg(){}

    public function dashboard()
    {
        return ['msg' => 'User Dashboard'];
    }

}
