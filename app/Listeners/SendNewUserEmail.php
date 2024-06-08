<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use App\Mail\AdminNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewUserEmail
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
    public function handle(NewUserRegistered $event): void
    {
        $user = $event->user;

        // Send email to admin
        Mail::to('alywalaaeldeen2003@gmail.com')->send(new AdminNotification($user));
    }
}
