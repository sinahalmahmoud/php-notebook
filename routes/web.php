<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Models\Post;

Route::get('/', function () {
    $posts =[];
    if(auth()->check())
    {
        $posts = auth() ->user() ->usersPosts() -> latest()->get();  
         
    }
  // $posts = auth() ->user() ->usersPosts() -> latest()->get();
  // $posts= Post::where('user_id', auth()->id())->latest()->get();
    return view('home',['posts' => $posts]);
});

Route::post('/register', [UserController::class,'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);

//blog post routers

Route::post('/create-post',[PostController::class, 'createPost']);
Route::get('/edit-post/{post}',[PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}',[PostController::class, 'acutallyUpdatePost']);
Route::delete('/delete-post/{post}',[PostController::class, 'deletePost']);
Route::get('/create-new-post', function () {
    return view('creat-post'); 
});
Route::get('/create-new-user', function () {
    return view('creat-user'); 
});



