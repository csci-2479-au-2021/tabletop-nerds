<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function listGames()
    {
        $games = ['Super Mario', 'Castlevania', 'Metroid'];

        return view('games', ['games' => $games]);
    }
}
