<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Publisher;
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
        // $userGames = auth()->user()?->userGame;
        $games = $this->gameService->getGames();
        // $gamesArray = [];

        // foreach ($games as $game) {
        //     $onWishlist = false;
        //     $userGame = $userGames?->where('id', $game->id)->first();

        //     if ($userGame) {
        //         $onWishlist = $userGame->pivot->on_wishlist === 1;
        //     }

        //     $gamesArray[] = [$onWishlist, $game];
        // }

        return view('games', ['games' => $games]);
    }

    
    
    public function gameView($id){
        $game = $this->gameService->getGameById($id);
        $onWishlist = $this->isOnWishlist($game);
        return view('gameView', compact('game', 'onWishlist'));

    }

    private function isOnWishlist(Game $game): bool
    {
        $userGames = auth()->user()?->userGame;
        $onWishlist = false;
        $userGame = $userGames?->where('id', $game->id)->first();



        if ($userGame) {
            $onWishlist = $userGame->pivot->on_wishlist === 1;
        }

        return $onWishlist;
    }


   


}
