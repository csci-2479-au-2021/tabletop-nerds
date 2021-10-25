<?php

namespace Database\Seeders;

use App\Models\GameType;
use Illuminate\Database\Seeder;

class GameTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gameFactory = GameType::factory();
        $gameFactory->create(['title' => 'Board']);
        $gameFactory->create(['title' => 'Video']);
    }
}