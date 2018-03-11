<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // event(new \App\Events\OrderShipped('12'));
        $event = new \App\Events\Pusher('test');
        event($event);
        // $pusher = new \Pusher\Pusher( 
        //     env('PUSHER_APP_KEY'),
        //     env('PUSHER_APP_SECRET'),
        //     env('PUSHER_APP_ID'),
        //     array( 'cluster' => 'ap1', 'encrypted' => true ) );
        // $pusher->trigger( 'my-channel', 'my_event', 'hello world' );
        //toOthers()排除当前用户
        return view('home');
    }
}
