<?php

namespace App\Listeners;

use App\Events\VisitCounter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VisitCounterIncrease
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
     * @param  object  $event
     * @return void
     */
    public function handle(VisitCounter $event)
    {
        $this -> updateViewsCount($event -> video);
    }

    public function updateViewsCount($video)
    {
        $video -> views = ($video -> views)+1;
        $video -> save();
    }
}
