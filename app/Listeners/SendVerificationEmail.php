<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\ConfirmUserEmail;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;

class SendVerificationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
		session(['user_name' => $event->user['name']]);
		$hash=hash('sha256',$event->user['email']);

		Mail::to('Sanya.Chuck@mail.ru')->send(new ConfirmUserEmail($hash));
    }
}
