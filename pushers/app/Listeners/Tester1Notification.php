<?php

namespace App\Listeners;

use App\Events\Tester1;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Tester1Notification
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
     * @param  Tester1  $event
     * @return void
     */
    public function handle(Tester1 $event)
    {
        //
    }
}
