<?php

namespace App\Repositories\Shop\SignUp;

use App\Http\Requests\SignUp\SignUpRequest;

interface SignUpRepositoryInterface
{
    public function signUpUser(SignUpRequest $request):mixed;
}
