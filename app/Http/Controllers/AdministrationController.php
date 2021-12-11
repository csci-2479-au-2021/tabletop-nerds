<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Publisher;
use App\Services\GameService;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    private GameService $gameService;
    
    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }
        

    

    public function adminView(){
        $games = $this->gameService->getGames();
        return view('admin', ['games' => $games]);
    }

    
    
    public function gameView($id){
        $game = $this->gameService->getGameById($id);
        $onWishlist = $this->isOnWishlist($game);
        return view('gameView', compact('game', 'onWishlist'));

    }

    


   


}
