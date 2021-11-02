<?php

namespace App\Http\Controllers;
// use App\Classes\WishlistGame;
// use App\Classes\Game;
use App\Models\Game;
use App\Services\GameService;

use Illuminate\Http\Request;

class GameController extends Controller
{
    private GameService $gameService;
    
    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }
        

    public function index()
    {
        $games = $this->gameService->getGames();

        return view('games', [
            'games' => $games,
        ]);
    }

    public function listGames(){
        return view('games', ['games'=>$this->gameService->getGames()]);
    }

    
    
    public function gameView($id){
        return view('gameView', ['game'=>$this->gameService->getGameById($id)]);

    }
}
