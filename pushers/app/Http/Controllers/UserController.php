<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userinfo()
    {
        $user = Auth::user();
        return response()->json(['code' => 0, 'user' => $user]);
    }
}
