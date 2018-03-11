<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
        
        // Broadcast::auth('chat-room.*', function ($user, $chatroomId) {
        //     return true;
        // });

        // Broadcast::auth('room.1', function ($user, $roomId) {
        //     return [
        //         'id' => $user->id,
        //         'name' => $user->name
        //     ];
        // });
    }
}
