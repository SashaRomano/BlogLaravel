<?php

namespace App\Http\Controllers;

use App\NewPost;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function __invoke($id){
        $new_post = NewPost::where('id', '=', $id)->first();

        return view('single_post', ['new_post'=>$new_post]);
    }
}
