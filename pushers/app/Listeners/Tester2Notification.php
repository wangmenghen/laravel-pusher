<?php

namespace App\Listeners;

use App\Events\Tester2;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Tester2Notification
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
     * @param  Tester2  $event
     * @return void
     */
    public function handle(Tester2 $event)
    {
        //
    }
}
