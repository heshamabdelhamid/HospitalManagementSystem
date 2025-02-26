<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.signin');
    }

    public function loginPost(LoginRequest $loginRequest)
    {
        if (
            ! Auth::guard('admin')->attempt([
                'email'    => $loginRequest->email,
                'password' => $loginRequest->password,
            ])
        ) {
            return redirect()->back()->with('error', __('auth.failed'));
        }

        return redirect()->route('dashboard.index');
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect()->route('dashboard.login.page');
    }
}
