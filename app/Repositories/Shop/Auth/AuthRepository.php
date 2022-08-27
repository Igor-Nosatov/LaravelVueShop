<?php

declare(strict_types=1);

namespace App\Repositories\Shop\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
use App\Repositories\Shop\Auth\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function registerUser(AuthRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $token = $user->createToken('shop-token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function loginUser(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'Bad creds',
            ], 401);
        }
        $token = $user->createToken('shop-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 200);
    }

    public function logoutUser()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function updateUser(Request $request)
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        return $user->update($request->all());
    }


    public function showUser()
    {
        $user = Auth::user()->role->name;
        return response()->json($user);
    }
}
