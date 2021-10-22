<?php

namespace App\Repositories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;

class GameRepository
{
    // in reality this class will utilize Eloquent models to query the DB

    public function getGames(): Collection
    {
        return Game::orderBy('name')->get();
    }
}