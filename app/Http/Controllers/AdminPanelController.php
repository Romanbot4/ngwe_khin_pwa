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

    public function categories()
    {
        return view('categories.categories');
    }

    public function users()
    {
        return view('users.users');
    }

    public function categoryTableData()
    {
        return DataTables::eloquent(TransactionCategory::query())
            ->addColumn('actions', function ($user) {
                return view('table.actions', [
                    "editModalId" => "#editCategoryFormModal",
                    "deleteModalId" => "#deleteCategoryFormModal",
                    "value" => json_encode(new TransactionCategoryResource($user))
                ]);
            })
            ->rawColumns(['actions'])
            ->toJson();
    }

    public function userTableData()
    {
        return DataTables::eloquent(User::query())
            ->addColumn('user', function ($user) {
                $diff = date_diff(date_create($user->created_at), new DateTime());
                $date = date_create($user->created_at);

                return view('users.user_table_row', [
                    "name" => $user->name,
                    "image" => $user->image,
                    "email" => $user->email,
                    "is_new_user" => $diff->days < 7,
                    "register_date" => date_format($date, "M d, Y")
                ]);
            })
            ->addColumn('actions', function ($user) {
                return view('table.actions', [
                    "editModalId" => "#editCategoryFormModal",
                    "deleteModalId" => "#deleteCategoryFormModal",
                    "value" => json_encode(new TransactionCategoryResource($user))
                ]);
            })
            ->rawColumns(['user', 'actions'])
            ->toJson();
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
