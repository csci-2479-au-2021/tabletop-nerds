<?php

namespace App\Services;

use App\Repositories\GameRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Game;

class GameService
{

    public function __construct(GameRepository $gameRepository)
        {
            $this->gameRepository = $gameRepository;
        }
    
    public function getGameById($id){
        $monopoly = new Game([
            'title' => "Monopoly",
            'description' => "Monopoly is a game with a bad reputation that it doesn't deserve. If players read the rules and played this game utilizing auctions,
                                the complaint that this game takes too long would dissapear. Read and play by the rules. Fight me if you disagree.",
            'image' =>"http://localhost/images/monopoly.jpg"]);
        $sorry = new Game([
            'title' => "Sorry",
            'description' => "I actually don't know anything about this game. The image was easy to find though. LOL, Sorry.",
            'image' =>"http://localhost/images/sorry.jpg"]);
        $gamelist = [$monopoly, $sorry];   
        $game = $gamelist[$id];
        // When respository has a method to get game by ID uncomment and insert into line below.
        // $game = $this->gameRepository->[insertmethodrepositorymetherehere]($id);
        return($game);
    }

    public function getGames($orderby = null, $direction = null, $limit= null)
    {   
        return ($this->gameRepository->getGames());
    }

    

    public function searchGamesByTitle (Request $title)
    {    
        return ($this->gameRepository->searchGamesByTitle($title));
    }


}