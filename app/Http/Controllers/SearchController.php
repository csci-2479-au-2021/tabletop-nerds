<?php

namespace App\Http\Controllers;
use App\Services\GameService;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    private GameService $gameService;
    
    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function searchGamesByTitle (Request $request){
        return ($this->gameService->searchGamesByTitle($request));
    }

  
}