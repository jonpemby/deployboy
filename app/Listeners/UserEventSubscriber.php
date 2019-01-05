<?php

namespace App\Listeners;

class UserEventSubscriber
{
    /**
     * Handler for user registration.
     *
     * @param \Illuminate\Auth\Events\Registered  $event
     */
    public function onUserRegistration($event)
    {
        //
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Registered',
            'App\Listeners\UserEventSubscriber@onUserRegistration'
        );
    }
}
