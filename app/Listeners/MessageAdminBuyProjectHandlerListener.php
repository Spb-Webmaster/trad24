<?php

namespace App\Listeners;

use App\Events\MessageAdminBuyProjectEvent;
use App\Mail\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageAdminBuyProjectHandlerListener
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
     * сообщение админу о покупке исследования
     */
    public function handle(MessageAdminBuyProjectEvent $event): void
    {
      $user_id = $event->user_id;
        $project_id = $event->project_id;
        $sendMail =  new SendMails();
        $sendMail->send_to_Admin_Buy_Project($user_id, $project_id);
    }
}
