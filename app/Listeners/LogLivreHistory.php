<?php

namespace App\Listeners;

use App\Events\LivreHistoryEvent;
use App\Models\LivreHistory;
use Illuminate\Support\Facades\Auth;

class LogLivreHistory
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
    public function handle(LivreHistoryEvent $event)
    {
        LivreHistory::create([
            'livre_id' => $event->livre->id,
            'changes' => json_encode($event->changes), // Save the changes in JSON format
            'action' => $event->action,
            'user_id' => $event->user ? $event->user->id : null, // Save the user ID (if available)
        ]);
    }
}
