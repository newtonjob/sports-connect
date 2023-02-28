<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:10,1');
    }

    public function login(Request $request)
    {
        throw_unless(Auth::attempt($request->only(['email', 'password']), $request->boolean('remember')),
            ValidationException::withMessages(['email' => __('auth.failed')])
        );

        return Response::api('Welcome Back...');
    }

    public function forgot(Request $request)
    {
        $status = Password::sendResetLink($request->only('email'));

        throw_unless($status == Password::RESET_LINK_SENT,
            ValidationException::withMessages(['password' => __($status)])
        );

        return Response::api(['title' => "Check your inbox", 'message' => __($status)]);
    }

    public function reset(Request $request)
    {
        $request->validate(['password' => 'required|min:5|confirmed']);

        $status = Password::reset($request->all(), function (User $user, $password) {
            Auth::login(tap($user, function ($user) use ($password) {
                $user->email_verified_at ??= now();
                $user->update(['password' => $password]);
            }));
        });

        throw_unless($status == Password::PASSWORD_RESET,
            ValidationException::withMessages(['password' => __($status)])
        );

        return Response::api(__($status));
    }
}
