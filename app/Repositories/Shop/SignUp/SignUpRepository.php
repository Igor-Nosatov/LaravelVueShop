<?php

namespace App\Repositories\Shop\SignUp;

use App\Repositories\Shop\SignUp\SignUpRepositoryInterface;
use App\Http\Requests\SignUp\SignUpRequest;
use App\Models\Shop\SignUp;

class SignUpRepository implements SignUpRepositoryInterface
{
    /**
     * @param SignUpRequest $request
     * @return mixed
     */
    public function signUpUser(SignUpRequest $request):mixed
    {
        return SignUp::create($request->all());
    }
}

