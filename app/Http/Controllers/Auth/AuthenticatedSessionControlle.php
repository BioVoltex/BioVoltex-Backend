<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Notifications\SendTwoFactorCode;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionControlle extends Controller
{
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $request->user()->generateTwoFactorCode();
        $request->user()->notify(new SendTwoFactorCode());
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
