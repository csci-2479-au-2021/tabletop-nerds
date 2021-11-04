<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameType;
use App\Models\Category;
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
        $sorry = $gameFactory->make(['title' => 'Sorry', 'image' => "http://localhost/images/sorry.jpg", 
            'description' => 'Lol, Sorry!', 'release_year' => "1930"]);
        $tetris = $gameFactory->make(['title' => 'Tetris', 'image' => "https://www.logolynx.com/images/logolynx/e6/e627e7db10c69b1d4a2b248f4e78386b.png", 
            'description' => 'Top Out!', 'release_year' => "1984"]);
        $monopoly = $gameFactory->make(['title' => 'Monopoly', 'image' => "http://localhost/images/monopoly.jpg", 
            'description' => 'Fight Me!', 'release_year' => "1935"]);

        $boardType->games()->saveMany([$sorry, $monopoly]);
        $videoType->games()->save($tetris);
    }
}
