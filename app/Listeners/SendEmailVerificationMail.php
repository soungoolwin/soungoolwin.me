<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Jobs\SendVerificationMail;


class SendEmailVerificationMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;
        SendVerificationMail::dispatch($user);
    }
}
