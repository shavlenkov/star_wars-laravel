<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninUserRequest;
use App\Http\Requests\SignupUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{

    /**
     * Display the signup view.
     *
     * @return View
     */
    public function getSignup(): View
    {
        return view('auth.signup');
    }

    public function postSignup(SignupUserRequest $request): RedirectResponse
    {

        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        $data['status'] = 0;

        $user = User::create($data);

        Auth::loginUsingId($user->id);

        return redirect()
            ->route('people.index');
    }

    public function getSignin(): View {
        return view('auth.signin');
    }

    public function postSignin(SigninUserRequest $request): RedirectResponse
    {

        $request->validated();

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()
                ->back();
        }

        return redirect()
            ->route('people.index');
    }

    public function getSignout(): RedirectResponse
    {
        Auth::logout();

        return redirect()
            ->route('get.signin');
    }
}
