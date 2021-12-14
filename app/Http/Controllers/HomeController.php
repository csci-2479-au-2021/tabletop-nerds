<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = self::getUser();
        return view('index', [
            'role' => $user->role->name
        ]);
    }

    private static function getUser(): User {
        return auth()->user();
    }
}
