<?php


namespace App\Services;


use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client,protected string $foo)
    {
    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.subscribers.lists');
        return $this->client->lists->addListMember(
            $list,
            [
                "email_address" => $email,
                "status"        => "subscribed",
            ]
        );
    }

    public function client(): ApiClient
    {
    }
}