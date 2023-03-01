<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
