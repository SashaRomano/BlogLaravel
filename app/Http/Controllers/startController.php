<?php

namespace App\Http\Controllers;

use App\NewPost;
use App\Post;
use Illuminate\Http\Request;

class startController extends Controller
{
    public function __invoke()
    {

        $new_posts = NewPost::all();

        return view('home',['new_post'=>$new_posts]);
    }
}
