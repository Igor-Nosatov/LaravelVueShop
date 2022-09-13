<?php

declare(strict_types=1);

namespace App\Repositories\Shop\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\Shop\Auth\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    /**
     * @param AuthRequest $request
     * @return mixed
     */
    public function registerUser(AuthRequest $request):mixed
    {
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $token = $user->createToken('access_token')->plainTextToken;

        $authData = [
            'userRole' => User::with(['role'])->where('id',$user->id)->first()->role_id,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
        return $authData;
    }

    /**
     * @param LoginRequest $request
     * @return mixed
     */
    public function loginUser(LoginRequest $request):mixed
    {
        $user = User::where('email', $request['email'])->first();
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'Bad creds',
            ], 401);
        }
        $token = $user->createToken('access_token')->plainTextToken;

        $authData = [
            'userRole' => User::with(['role'])->where('id',$user->id)->first()->role_id,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
        return $authData;
    }

    /**
     * @return mixed
     */
    public function logoutUser():mixed
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateUser(Request $request):mixed
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        return $user->update($request->all());
    }

    /**
     * @return mixed
     */
    public function showUser():mixed
    {
        $user = Auth::user()->role->name;
        return response()->json($user);
    }
}
