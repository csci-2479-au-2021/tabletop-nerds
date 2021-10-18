<?php

namespace App\Http\Controllers;
use App\Classes\WishlistGame;
use App\Classes\Game;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function listGames()
    {
        $games = ['Donkey Kong', 'Super Mario 2', 'Tetris'];
        

        $monopoly = new Game("Monopoly","Best Game Ever","http://localhost/images/monopoly.jpg");
        $sorry = new Game("Sorry","2nd Best Game Ever","http://localhost/images/sorry.jpg"); 
        $boardGames = [$monopoly, $sorry];
        return view('games', compact('games','boardGames'));
    }

    public function gameView($id){
        $monopoly = new Game("Monopoly",
        "Monopoly is a game with a bad reputation that it doesn't deserve. If players read the rules and played this game utilizing auctions, 
        the complaint that this game takes too long would dissapear. Read and play by the rules. Fight me if you disagree.",
        "http://localhost/images/monopoly.jpg");
        $sorry = new Game("Sorry",
        "I actually don't know anything about this game. The image was easy to find though. LOL, Sorry.",
        "http://localhost/images/sorry.jpg"); 
        $gamelist = [$monopoly, $sorry];   
        $game= $gamelist[$id];
        return view('gameView', compact('game')); 
    }
}
