<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App-User.*', function () {
    return true;
});

Broadcast::channel('order.*', function ($user) {
    return true;
});

Broadcast::channel('chat-room-presence.*', function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name
        ];
});
