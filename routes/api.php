<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', function(){
    return response()->json(\App\Post::paginate(5),200);
});

Route::get('/post/{id}', function($id){
    try{
        $post = \App\Post::findOrFail($id);
    }catch(Exception $exception){
        return response()->json(['Msg'=>'Post not found'], 404);
    }

    return response()->json($post,200);
});

Route::delete('/post/{id}', function ($id){
    try{
        $post = \App\Post::findOrFail($id);
    }catch (Exception $exception){
        return response()->json(['Msg'=>$exception->getMessage()],404);
    }
    $post->delete();
    return response()->json(['Msg'=>'post deleted succesfully'],200);
});

Route::post('/post','ApiAdminController@create');

Route::put('/post/{id}','ApiAdminController@update');
