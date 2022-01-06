<?php


namespace App\Services;


use MailchimpMarketing\ApiClient;
use MailchimpMarketing\Configuration;

class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.subscribers.lists');
        return $this->client()->lists->addListMember(
            $list,
            [
                "email_address" => $email,
                "status"        => "subscribed",
            ]
        );
    }

    public function client()
    {
        $client = new ApiClient();
        $client->setConfig(
            [
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server'),
            ]
        );
        return $client;
    }
}