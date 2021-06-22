<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class APIAdminController extends Controller
{
    public function create(Request $request)
    {
        $post = new Post();
        $post->author_id = $request->post('author');
        $post->post_title = $request->post('post_title');
        $post->post_text = $request->post('post_text');
        $post->img = $request->post('img');
        $post->save();

        return response()->json($post,201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->author_id = $request->post('author');
        $post->post_title = $request->post('post_title');
        $post->post_text = $request->post('post_text');
        $post->img = $request->post('img');
        $post->save();

        return response()->json($post,200);
    }
}
