<?php

namespace App\Listeners;

use App\Events\AdminCreateUserEvent;
use App\Mail\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdminCreateUserHandlerListener
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
     * сообщение user, о том, что его зарегистрировали
     */
    public function handle(AdminCreateUserEvent $event): void
    {

                $data = $event->request;
                $sendMail =  new SendMails();
                $sendMail->sendAdmin_to_User($data);

    }
}
