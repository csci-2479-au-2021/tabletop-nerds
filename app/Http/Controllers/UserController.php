<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewProfile()
    {
        $userId = {{ auth()->user()->id }};
        return view('profile', ['userId' => $userId]);
    }
}
