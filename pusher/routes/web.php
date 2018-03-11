<?php
use Pusher\Laravel\Facades\Pusher;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
    $user = Auth::user();
    $message = '哈哈哈，大家都一样';
    broadcast(new \App\Events\ChatMessageWasReceived($message, $user))->toOthers();
    event(new \App\Events\ChatMessageWasReceived($message, $user));
    event(new \App\Events\PresenceChatChannel($user));
    broadcast(new \App\Events\PresenceChatChannel($user));
    return view('pusher');
});

Route::get('/bridge', function() {
    // $pusher = \Illuminate\Support\Facades\App::make('pusher');

    Pusher::trigger( 'test-channel',
                      'test-event', 
                      ['text' => 'I Love China!!!']
                    );
    return 'This is a Laravel Pusher Bridge Test!';
});

Route::get('/userinfo', 'UserController@userinfo');