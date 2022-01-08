<?php

namespace App\Providers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application Services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class,function(){
            $client = new ApiClient();
            $client->setConfig(
                [
                    'apiKey' => config('services.mailchimp.key'),
                    'server' => config('services.mailchimp.server'),
                ]
            );
           return new MailchimpNewsletter(
               $client,
               'foobar'
           );
        });
    }

    /**
     * Bootstrap any application Services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
    }
}
