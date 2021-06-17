<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class simplePageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function contacts()
    {
        return view('contacts', ['contacts'=>Contact::all()]);
    }
}
