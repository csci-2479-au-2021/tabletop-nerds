<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Publisher;
use App\Http\Requests\AddGameRequest;
use App\Http\Requests\UpdateGameRequest;
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

    public function activateDeactivateGame($id){
        $game = $this->administrationService->activateDeactivateGame($id);
        return redirect()->route('AdminView');
    }
    
    public function updateGame($id){
        $game = $this->administrationService->getGameById($id);
        $publishers = $this->administrationService->getPublishers();
        $categories = $this->administrationService->getCategories();
        $gameCategories = [];
        foreach($game->gameCategory as $cat){
        array_push($gameCategories, $cat->name);
        }
        
        return view('updateGame', compact('game','publishers','categories','gameCategories'));

    }

    public function postUpdateGame(UpdateGameRequest $request){
        $validatedInput = $request->validated();
        $updateGameInfo = $this->administrationService->updateGame(
            $validatedInput['game_id'],
            $validatedInput['title'],
            $validatedInput['publisher'],
            $validatedInput['category'],
            $validatedInput['release_year'],
            $validatedInput['description']);    
        return redirect()->route('AdminView');
    }

    public function addGame(){
        $publishers = $this->administrationService->getPublishers();
        $categories = $this->administrationService->getCategories();
        return view('addGame', compact('publishers','categories'));
    }

    public function postAddGame(AddGameRequest $request){
        $validatedInput = $request->validated();
        $updateGameInfo = $this->administrationService->addGame(
            $validatedInput['title'],
            $validatedInput['publisher'],
            $validatedInput['category'],
            $validatedInput['release_year'],
            $validatedInput['description']);    
        return redirect()->route('AdminView', 'updateGameInfo');
    }

    

}
