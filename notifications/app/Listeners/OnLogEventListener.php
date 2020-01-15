<?php

namespace App\Listeners;

use App\Events\OnLogEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class OnLogEventListener
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
     * @param  OnLogEvent  $event
     * @return void
     */
    public function handle(OnLogEvent $event)
    {
        $id  = $event->getId();
        sleep(1);
        Log::info($id);
    }
}
