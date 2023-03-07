<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SignUpController extends Controller
{
    public function index()
    {
        return view('cms.authenticaions.signup');
    }


    public function signUp(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required', Password::min(8)],
        ]);

        $role_id = Config('codusk.user_role_id');

        $user = new User;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->syncRoles($role_id);
        $user->save();

        return redirect()->intended('/');
    }
}
