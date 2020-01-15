<?php

namespace App\Listeners;

use App\Events\SaveDatabaseEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SaveDatabase;
use Log;

class SaveDatabaseEventListener
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
     * @param  SaveDatabaseEvent  $event
     * @return void
     */
    public function handle(SaveDatabaseEvent $event)
    {
        SaveDatabase::dispatch($event->name);
        Log::info("Listener of name: ".$event->name);
    }
}
