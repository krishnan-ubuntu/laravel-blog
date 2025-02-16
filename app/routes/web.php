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


Route::get('/', 'App\Http\Controllers\BlogController@index');
Route::get('/category/posts/{catSlug}', 'App\Http\Controllers\BlogController@category_blog_posts');
Route::get('/error', 'App\Http\Controllers\BlogController@blog_error');

Route::get('/dashboard', 'App\Http\Controllers\BlogController@dashboard');
Route::get('/posts', 'App\Http\Controllers\BlogController@admin_blog_posts');
Route::get('/posts/create', 'App\Http\Controllers\BlogController@create_blog_post');
Route::post('/posts/save', 'App\Http\Controllers\BlogController@save_blog_post');
Route::get('/categories', 'App\Http\Controllers\BlogController@blog_categories');
Route::get('/categories/create', 'App\Http\Controllers\BlogController@create_blog_category');
Route::post('/categories/save', 'App\Http\Controllers\BlogController@save_blog_category');
Route::get('/users', 'App\Http\Controllers\BlogController@blog_users');
Route::post('/users/create', 'App\Http\Controllers\BlogController@create_blog_user');
Route::get('/login', 'App\Http\Controllers\BlogAuthController@login');
Route::post('/auth', 'App\Http\Controllers\BlogAuthController@login_auth');
Route::get('/logout', 'App\Http\Controllers\BlogAuthController@logout');
Route::get('/visitor/login', 'App\Http\Controllers\BlogVisitorAuthController@login');
Route::post('/visitor/auth', 'App\Http\Controllers\BlogVisitorAuthController@login');

//This has to remain at the last
Route::get('{postSlug}', 'App\Http\Controllers\BlogController@blog_posts');