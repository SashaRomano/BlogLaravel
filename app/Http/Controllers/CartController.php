<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id){

        $post = Post::find($id);

        \Cart::add([
            'id' => $post->id,
            'name' => $post->post_title,
            'price' => $post->author_id,
            'quantity' => 1,
            'attributes' => [
                'image' => $post->img,
            ],
        ]);

        return back();
    }

    public function show(){
        return view('cart');
    }

    public function delete($id){
        \Cart::remove($id);
        return back();
    }
}
