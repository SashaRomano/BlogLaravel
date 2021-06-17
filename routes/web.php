<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', startController::class)->name('start');

Route::get('/about', 'simplePageController@about')->name('ab');

Route::get('/services', 'simplePageController@services')->name('serv');

Route::get('/contacts', 'simplePageController@contacts')->name('cont');

Route::get('/author/{key}', PostsByAuthorController::class)->name('posts_by_author');

Route::get('/new_post/{id}', SinglePostController::class)->name('single_post');

Route::get('/category/{key}', PostsByCategoryController::class)->name('posts_by_category');


