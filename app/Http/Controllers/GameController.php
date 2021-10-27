<?php

namespace App\Http\Controllers;
// use App\Classes\WishlistGame;
// use App\Classes\Game;
use App\Models\Game;
use App\Services\GameService;

use Illuminate\Http\Request;

class GameController extends Controller
{

    public function __construct(
        private GameService $gameService
        ) { }

    public function index()
    {
        $games = $this->gameService->getGames();

        return view('games', [
            'games' => $games,
        ]);
    }

    // this function needs updated to find id from game DB + disp individual game details
    
    public function gameView($id){
        $monopoly = new Game([
            'title' => "Monopoly",
            'description' => "Monopoly is a game with a bad reputation that it doesn't deserve. If players read the rules and played this game utilizing auctions,
        the complaint that this game takes too long would dissapear. Read and play by the rules. Fight me if you disagree.",
        "http://localhost/images/monopoly.jpg"]);
        $sorry = new Game([
            'title' => "Sorry",
            'description' => "I actually don't know anything about this game. The image was easy to find though. LOL, Sorry.",
        "http://localhost/images/sorry.jpg"]);
        $gamelist = [$monopoly, $sorry];   
        $game = $gamelist[$id];
        return view('gameView', compact('game')); 
    }
}
