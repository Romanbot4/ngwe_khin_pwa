<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\SignInRequest;
use App\Http\Requests\V1\SignupRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    use ApiResponse;

    public function signUp(SignupRequest $request)
    {
        $data = $request->validated();
        /**
         * @var User
         */
        $user = User::create($data);
        return $this->respondAuthUser($user);
    }

    public function signIn(SignInRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($request->only('email', 'password'))) {
            /**
             * @var User
             */
            $user = User::firstWhere('email', $data['email']);
            return $this->respondAuthUser($user);
        }

        return $this->notAuthorized('Password or email is not correct. Failed to sign in.');
    }

    protected function respondAuthUser(User $user)
    {

        $token = $user->createToken($user->email)->plainTextToken;
        return $this->ok([
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }
}
