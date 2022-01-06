<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{

    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'email|required']);
        try {
            $newsletter->subscribe(request('email'));
        }
        catch (\Exception $exception){
            throw ValidationException::withMessages(['email'=>'Your email cannot be added to our list']);
        }
        return redirect('/')->with('success', 'Subscribed Successfully');
    }
}
