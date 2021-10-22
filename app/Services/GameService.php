<?php

namespace App\Services;

use App\Repositories\GameRepository;
use Illuminate\Database\Eloquent\Collection;

class GameService
{
    public function __construct(
        private GameRepository $gameRepository
    ) {}

    public function getGames(): Collection
    {
        return $this->gameRepository->getGames();
    }
}