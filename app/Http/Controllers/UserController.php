<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showProfile($userId = null) {
        $user = null;

        if($userId != null) {
            $user = User::find($userId);
        } else {
            $user = User::find(Auth::user()->id);
        }

        return view('profile', [
            'user' => $user
        ]);
    }
}
