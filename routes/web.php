<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

Route::post(
    'newsletter',
    function () {
        request()->validate(['email' => 'email|required']);
        $mailchimp = new ApiClient();

        $mailchimp->setConfig(
            [
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server'),
            ]
        );


        try {
            $response = $mailchimp->lists->addListMember(
                '01d51bce12',
                [
                    'email_address' => request('email'),
                    'status'        => 'subscribed',
                ]
            );
        } catch (Exception $exception) {
            throw ValidationException::withMessages(['email' => 'Your email cannot be added to our list']);
        }

        return redirect('/')->with('success', 'Your email has been added to our list');
    }
);

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts');
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::get(
    'authors/{author:username}',
    function (User $author) {
        return view('posts', ['posts' => $author->posts]);
    }
)->name('authors');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy']);
Route::get('login', [SessionController::class, 'create']);
Route::post('login', [SessionController::class, 'store']);
