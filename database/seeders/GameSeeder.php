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
        $boardType = GameType::where('name', 'board')->first();
        $videoType = GameType::where('name', 'video')->first();

        $gameFactory = Game::factory();
        $sorry = $gameFactory->make(['name' => 'Sorry']);
        $tetris = $gameFactory->make(['name' => 'Tetris']);
        $monopoly = $gameFactory->make(['name' => 'Monopoly']);

        $boardType->games()->saveMany([$sorry, $monopoly]);
        $videoType->games()->save($tetris);
    }
}
