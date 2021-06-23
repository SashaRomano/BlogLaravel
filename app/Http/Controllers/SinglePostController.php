<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::where('id', '=', $id)->first();
        $comments = Comment::where('post_id', '=', $id)->get();
        $post->read = $post->read + 1;
        $post->save();

        return view('single_post', ['post' => $post, 'comments' => $comments]);
    }
}
