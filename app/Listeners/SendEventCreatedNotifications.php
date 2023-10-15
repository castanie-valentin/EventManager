<?php

namespace App\Listeners;

use App\Events\EventCreated;
use App\Models\User;
use App\Notifications\NewEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEventCreatedNotifications implements ShouldQueue
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
    public function handle(EventCreated $event): void
    {
        foreach (User::whereNot('id', $event->event->user_id)->cursor() as $user) {
            $user->notify(new NewEvent($event->event));
        }
    }
}
