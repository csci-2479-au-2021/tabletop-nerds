<?php

namespace App\Http\Controllers;

use App\Models\ReviewAndWishlist;
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
        $userGames = auth()->user()->userGame;
        $games = $this->gameService->getGames();

        foreach ($games as $game) {
            $userGame = $userGames->where('id', $game->id)->first();

            if ($userGame) {
                $game->onWishlist = $userGame->pivot->on_wishlist === 1;
            }
        }

        return view('games', ['games' => $games]);
    }

    
    
    public function gameView($id){
        $game = $this->gameService->getGameById($id);
        return view('gameView', compact('game'));

    }


   


}
