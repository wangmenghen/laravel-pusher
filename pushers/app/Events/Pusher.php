<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Log;
class Pusher implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $info;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this->info = $info;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        Log::info('broadcaston');
        // return new PrivateChannel('order.'.$this->update->order_id);
        return ['rmz'];
    }

    public function broadcastAs()
    {
        return 'rmz-event';
    }

    public function broadcastWith()
    {
        return ['info' => $this->info];
    }
}
