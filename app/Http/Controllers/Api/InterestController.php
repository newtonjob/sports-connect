<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InterestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['sport_id' => 'required']);

        $request->user()->sports()->attach($request->sport_id);

        return Response::api('Interests added successfully');
    }
}
