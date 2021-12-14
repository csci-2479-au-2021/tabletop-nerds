<?php

namespace App\Services;

use App\Repositories\GameRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Game;

class AdministrationService
{
    public function __construct(GameRepository $gameRepository)
        {
            $this->gameRepository = $gameRepository;
        }
    
    public function getGameById($id){
        $game = $this->gameRepository->getGameById($id);
        return($game);
    }

    public function getGames($orderby = null, $direction = null, $limit= null)
    {   
        return ($this->gameRepository->getGames());
    }

    public function getPublishers()
    {   
        return ($this->gameRepository->getPublishers());
    }

    public function getCategories()
    {   
        return ($this->gameRepository->getCategories());
    }

    public function activateDeactivateGame ($id)
    {    
        $this->gameRepository->activateDeactivateGame($id);
    }

    public function updateGame(int $game_id, string $title, int $publisher, array $category, int $release_year, string $description){
        $this->gameRepository->updateGame($game_id, $title, $publisher, $category, $release_year, $description);
    }

    public function addGame(string $title, int $publisher, array $category, int $release_year, string $description){
        $image = null;
        $this->gameRepository->addGame($title, $image, $publisher, $category, $release_year, $description);
    }

}
