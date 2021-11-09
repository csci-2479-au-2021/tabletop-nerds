<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Category;
use App\Models\Publisher;
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
        $gameFactory = Game::factory();
        $sorry = $gameFactory->make([
            'title' => 'Sorry', 
            'image' => "http://localhost/images/sorry.jpg", 
            'description' => 'Lol, Sorry!', 
            'release_year' => "1930"]);
        $splendor = $gameFactory->make([
            'title' => 'Splendor', 
            'image' => "http://localhost/images/splendor.jpg", 
            'description' => 'Strategy turn-based card game, players assume the role of wealthy Renaissance merchants, exploiting mines and caravans, hiring craftsmen and leveraging their influence with nobility.', 
            'release_year' => "2014"]);
        $concordia = $gameFactory->make([
            'title' => 'Concordia', 
            'image' => "http://localhost/images/concordia.jpg", 
            'description' => 'Peaceful strategy game of economic development in Roman times', 
            'release_year' => "2013"]);
        $labyrinth = $gameFactory->make([
            'title' => 'Labyrinth', 
            'image' => "http://localhost/images/labyrinth.jpg",
            'description' => 'In this enchanted labyrinth players set out to search for mysterious objects and creatures.', 
            'release_year' => "1986"]);


        $cardCat = Category::where('code', 'CARD')->first();
        $advnCat = Category::where('code', 'ADVN')->first();
        $wargCat = Category::where('code', 'WARG')->first();
        $civiCat = Category::where('code', 'CIVI')->first();

        $cardCat->games()->save($splendor);
        $advnCat->games()->save($labyrinth);
        $wargCat->games()->save($sorry);
        $civiCat->games()->save($concordia);
    }
}
