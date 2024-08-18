<?php

namespace App\Http\Controllers;

use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class AdminPanelController extends Controller
{
    public function index() {
        return view('index');
    }

    public function categories()
    {
        return view('categories');
    }

    public function category() {
        return DataTables::of(User::query())->make(true);
    }
}
