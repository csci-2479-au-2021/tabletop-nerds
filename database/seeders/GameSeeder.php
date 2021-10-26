<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameType;
use Database\Factories\GameFactory;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boardType = GameType::where('title', 'board')->first();
        $videoType = GameType::where('title', 'video')->first();

        $gameFactory = Game::factory();
        $sorry = $gameFactory->make(['title' => 'Sorry','release_year' => "1930"]);
        $tetris = $gameFactory->make(['title' => 'Tetris', 'release_year' => "1984"]);
        $monopoly = $gameFactory->make(['title' => 'Monopoly','release_year' => "1935"]);

        $boardType->games()->saveMany([$sorry, $monopoly]);
        $videoType->games()->save($tetris);
    }
}
