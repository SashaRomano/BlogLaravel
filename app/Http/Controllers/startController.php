<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class startController extends Controller
{
    public function __invoke()
    {
        return view('home');
    }
}
