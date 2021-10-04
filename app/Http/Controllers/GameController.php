<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function listGames()
    {
        $games = ['Donkey Kong', 'Super Mario 2', 'Tetris'];

        return view('games', ['games' => $games]);
    }
}
