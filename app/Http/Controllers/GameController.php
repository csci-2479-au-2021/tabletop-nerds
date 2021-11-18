<?php

namespace App\Http\Controllers;
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
        $game = $this->gameService->getGameById($id);
        return view('gameView', compact('game'));

    }


   


}
