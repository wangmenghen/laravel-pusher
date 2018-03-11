<?php

namespace App\Listeners;

use App\Events\Pusher;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PusherEventNotification
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
     * @param  Pusher  $event
     * @return void
     */
    public function handle(Pusher $event)
    {   
        // var_dump('123');
        // die();
    }
}
