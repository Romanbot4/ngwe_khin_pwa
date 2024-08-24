<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected string $image_folder = "profile_images";

    public function updateProfile(UpdateUserProfileRequest $request, User $user)
    {
        $image = $request->file('image');
        $path = null;
        if ($image != null) {
            if($user->image != null) Storage::delete($user->image);
            $path = $image->store($this->image_folder);
        }
        $data = [...$request->all()];
        if($path != null) $data['image'] = $path;

        $user->fill($data);
        $user->save();
        return redirect('profile/' . $user->id);
    }
}
