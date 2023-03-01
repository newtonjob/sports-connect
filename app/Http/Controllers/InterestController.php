<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->user()->sports()->exists()) {
            return to_route('home');
        }

        return view('interests', ['sports' => Sport::all()]);
    }
}
