<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'password' => 'required|min:5|confirmed',
            'email'    => 'required|unique:users',
            'phone'    => 'required|unique:users|min:10',
            'username' => 'required|unique:users|min:5',
        ]);

        Auth::login(User::create($request->all()));

        return Response::api([
            'title'   => 'Check your email',
            'message' => 'We sent you a special link to verify your email',
        ]);
    }
}
