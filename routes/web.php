<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use MailchimpMarketing\ApiClient;

Route::get('ping',function (){
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => config('services.mailchimp.server')
    ]);

    $response = $mailchimp->lists->addListMember('01d51bce12',[
        'email_address' => 'kkz@gmail.com',
        'status' => 'subscribed'
    ]);
    ddd($response);
});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts');
Route::post('posts/{post:slug}/comments',[CommentController::class,'store'])->middleware('auth');

Route::get('authors/{author:username}',
    function (User $author) {
        return view('posts', ['posts' => $author->posts]);
    }
)->name('authors');

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::post('logout',[SessionController::class,'destroy']);
Route::get('login',[SessionController::class,'create']);
Route::post('login',[SessionController::class,'store']);
