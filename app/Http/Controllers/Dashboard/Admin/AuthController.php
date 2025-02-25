<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\LoginRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.signin');
    }

    public function loginPost(LoginRequest $loginRequest)
    {
        dd($loginRequest->all());
    }

}
