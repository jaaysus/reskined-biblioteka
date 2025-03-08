<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;

use App\Models\Livre;
use Illuminate\Queue\SerializesModels;

class LivreHistoryEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $livre;
    public $action;
    public $changes;
    public $user;
    
    public function __construct(Livre $livre, string $action, $changes = null, $user = null)
    {
        $this->livre = $livre;
        $this->action = $action;
        $this->changes = $changes;
        $this->user = $user;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
