<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'password' => 'min:5|confirmed',
            'email'    => 'unique:users',
            'phone'    => 'nullable|unique:users|min:10'
        ]);

        return Response::api([
            'title'   => "Check your email",
            'message' => "Registration successful",
            'data'    => ['user' => User::create($request->all())]
        ]);
    }
}
