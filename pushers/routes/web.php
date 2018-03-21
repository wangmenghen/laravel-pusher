<?php
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

Route::get('/tester1', function () {
    event(new \App\Events\tester1('This is a public attribute', '2', 'This is a private attribute', 'This is a protected attribute'));
    event(new \App\Events\Event('hello test private'));
    event(new \App\Events\PushNoticeToAllUsers('hello'));
    return 'This is a Laravel Broadcaster Test, and private/protected attribute is not fired!';
});

Route::get('/my-home', function () {
    $user = Auth::user();
    // var_dump($user);
    // die();
    event(new \App\Events\tester2($user));
    return 'This is home!';
});

Route::get('/userinfo', 'UserController@userinfo');