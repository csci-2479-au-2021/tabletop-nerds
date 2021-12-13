<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Publisher;
use App\Services\AdministrationService;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    private AdministrationService $administrationService;
    
    public function __construct(AdministrationService $administrationService)
    {
        $this->administrationService = $administrationService;
    }
        
    public function adminView(){
        $games = $this->administrationService->getGames();
        return view('admin', ['games' => $games]);
    }
    
    public function updateGame($id){
        $game = $this->administrationService->getGameById($id);
        return view('updateGame', compact('game'));

    }

    public function activateDeactivateGame($id){
        $game = $this->administrationService->activateDeactivateGame($id);
        return redirect()->route('AdminView');
    }

}
