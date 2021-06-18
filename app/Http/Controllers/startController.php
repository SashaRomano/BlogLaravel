<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class startController extends Controller
{
    public function __invoke()
    {

        $posts = Post::orderBy('id', 'DESC')->limit(3)->get();

        return view('start',['post'=>$posts]);
    }
}
