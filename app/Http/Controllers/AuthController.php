<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{

    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required'
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['status'] = 0;

        $user = User::create($data);

        Auth::loginUsingId($user->id);

        return redirect()
            ->route('people.index');
    }

    public function getSignin() {
        return view('auth.signin');
    }

    public function postSignin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()
                ->back();
        }

        return redirect()
            ->route('people.index');
    }

    public function getSignout()
    {
        Auth::logout();

        return redirect()
            ->route('get.signin');
    }
}
