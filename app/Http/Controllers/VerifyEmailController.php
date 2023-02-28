<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('signed');
    }

    public function __invoke(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return view('verification.verify');
    }
}
