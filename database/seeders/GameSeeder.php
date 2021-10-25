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
        $sorry = $gameFactory->make(['title' => 'Sorry']);
        $tetris = $gameFactory->make(['title' => 'Tetris']);
        $monopoly = $gameFactory->make(['title' => 'Monopoly']);

        $boardType->games()->saveMany([$sorry, $monopoly]);
        $videoType->games()->save($tetris);
    }
}
