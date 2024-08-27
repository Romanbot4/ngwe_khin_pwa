<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\TransactionCategoryResource;
use App\Models\User;
use DateTime;
use Yajra\DataTables\Facades\DataTables;

class UserViewController extends Controller
{
    public function user()
    {
        return view('user.user');
    }

    public function userTableData()
    {
        return DataTables::eloquent(User::query())
            ->addColumn('user', function ($user) {
                $diff = date_diff(date_create($user->created_at), new DateTime());
                $date = date_create($user->created_at);

                return view('user.user_table_row', [
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

    public function userProfile(User $user)
    {
        return view('profile.profile', [
            ...$user->toArray(),
            'image' => url_storage($user->image)
        ]);
    }
}
