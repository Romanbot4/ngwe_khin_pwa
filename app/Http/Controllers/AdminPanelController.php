<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\SignInRequest;
use App\Http\Requests\V1\SignupRequest;
use App\Http\Resources\V1\TransactionCategoryResource;
use App\Models\TransactionCategory;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function signup()
    {
        return view('signup.signup');
    }



    public function handleLogin(SignInRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function handleSignup(SignupRequest $request)
    {
        $data = $request->validated();
        User::create($data);
        return redirect()->route('login');
    }


}
