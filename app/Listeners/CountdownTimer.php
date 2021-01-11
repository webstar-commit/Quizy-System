<?php

namespace App\Listeners;

use App\Events\QuizStarted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CountdownTimer
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
     * @param  QuizStarted  $event
     * @return void
     */
    public function handle(QuizStarted $event)
    {
        var_dump($event->quiz['quiz']. 'is started ');
    }
}
