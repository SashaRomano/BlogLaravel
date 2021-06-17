<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class PostsByCategoryController extends Controller
{
    public function __invoke($key){
        $category = Category::where('key', '=', $key)->first();

        return view ('posts_by_category', ['category' => $category]);
    }
}
