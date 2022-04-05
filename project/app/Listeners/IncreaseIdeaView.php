<?php

namespace App\Listeners;

use App\Events\ViewIdeaEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseIdeaView
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
     * @param  \App\Events\ViewIdeaEvent  $event
     * @return void
     */
    public function handle(ViewIdeaEvent $event)
    {
        $event->idea->increment('view_count');
    }
}
