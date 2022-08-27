<?php

namespace App\Repositories\Shop\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
interface AuthRepositoryInterface
{
    public function registerUser(AuthRequest $request);
    public function loginUser(Request $request);
    public function updateUser(Request $request);
    public function logoutUser();
    public function showUser();
}
