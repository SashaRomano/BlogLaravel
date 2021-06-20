<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function add()
    {
        $authors = Author::all();
        $categories = Category::all();

        return view('Admin.admin_add_post', ['authors' => $authors, 'categories' => $categories]);
    }

    public function save(Request $request)
    {
        if (Auth::check()) {
            if ($request->method() == 'POST') {
                $this->validate($request, [
                    'author_id' => 'required | numeric',
                    'post_title' => 'required | string | max:100 | min:5',
                    'post_text' => 'required | min:20',
                    'img' => 'image',
                ]);
                $post = new Post();
                $post->author_id = $request->input('author_id');
                $post->post_title = $request->input('post_title');
                $post->post_text = $request->input('post_text');
                $img = $request->img;
                if ($img) {
                    $imgName = $img->getClientOriginalName();
                    $img->move('Imgs', $imgName);
                    $post->img = ('http://blog-lar-1/Imgs/' . $imgName);
                }
            }
            $post->save();
            $post->category()->sync($request->input('category_id'), false);
            $post->category()->getRelated();
            return redirect()->route('single_post', $post->id);
        } else {
            return redirect()->route('start');
        }
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $post = Post::where('id', '=', $id)->first();
            $authors = Author::all();
            return view('Admin.edit_post', ['post' => $post, 'authors' => $authors]);
        } else {
            return redirect('404');
        }
    }

    public function edit_save(Request $request)
    {
        if (Auth::check()) {
            if ($request->method() == 'POST') {
                $this->validate($request, [
                    'author_id' => 'required | numeric',
                    'post_title' => 'required | string | max:100 | min:5',
                    'post_text' => 'required | min:20',
                    'img' => 'image',
                ]);
                $post = Post::where('id', '=', $request->input('id'))->first();
                $post->author_id = $request->input('author_id');
                $post->post_title = $request->input('post_title');
                $post->post_text = $request->input('post_text');
                $img = $request->img;
                if ($img) {
                    $imgName = $img->getClientOriginalName();
                    $img->move('Imgs', $imgName);
                    $post->img = ('http://blog-lar-1/Imgs/' . $imgName);
                }
            }
            $post->save();
            return redirect()->route('single_post', $post->id);
        } else {
            return redirect()->route('start');
        }
    }

    public function delete(Request $request){
        if($request->method() == 'DELETE'){
            $post = Post::find($request->input('id'));
            $post->delete();
            return back();
        }else{
            return view ('Admin.admin_post', ['posts'=>Post::all()]);
        }
    }
}
