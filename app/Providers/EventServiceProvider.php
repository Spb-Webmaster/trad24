<?php

namespace App\Providers;

use App\Events\AdminCreateUserEvent;
use App\Events\CreateUserEvent;
use App\Events\MessageAdminBuyProjectEvent;
use App\Events\MessageAdminCreateUserEvent;
use App\Events\ResetPasswordEvent;
use App\Listeners\AdminCreateUserHandlerListener;
use App\Listeners\CreateUserHandlerListener;
use App\Listeners\MessageAdminBuyProjectHandlerListener;
use App\Listeners\MessageAdminCreateUserHandlerListener;
use App\Listeners\ResetPasswordHandlerListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        /*  Registered::class => [
            SendEmailVerificationNotification::class,
        ],*/

        CreateUserEvent::class => [
            CreateUserHandlerListener::class
        ],
        AdminCreateUserEvent::class => [
            AdminCreateUserHandlerListener::class
        ],
        MessageAdminCreateUserEvent::class => [
            MessageAdminCreateUserHandlerListener::class
        ],
        ResetPasswordEvent::class => [
            ResetPasswordHandlerListener::class
        ],
        MessageAdminBuyProjectEvent::class => [
            MessageAdminBuyProjectHandlerListener::class
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
