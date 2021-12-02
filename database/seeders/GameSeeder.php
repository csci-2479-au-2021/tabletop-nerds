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
            $econCat = Category::where('code', 'ECON')->first();
            $negoCat = Category::where('code', 'NEGO')->first();
            $diceCat = Category::where('code', 'DICE')->first();
            $advnCat = Category::where('code', 'ADVN')->first();
            $fantCat = Category::where('code', 'FANT')->first();
            $fighCat = Category::where('code', 'FIGH')->first();
            $puzzCat = Category::where('code', 'PUZZ')->first();
            $miniCat = Category::where('code', 'MINI')->first();
            $terrCat = Category::where('code', 'TERR')->first();
            $wargCat = Category::where('code', 'WARG')->first();
            $scifCat = Category::where('code', 'SCIF')->first();
            $civiCat = Category::where('code', 'CIVI')->first();
    
            Publisher::where('code', 'FFG')->first()->games()->save($sorry);
            // Publisher::where('code', 'ZMG')->first()->games()->save();
            // Publisher::where('code', 'KOS')->first()->games()->save();
            Publisher::where('code', 'DOW')->first()->games()->save($splendor);
            // Publisher::where('code', 'CMN')->first()->games()->save();
            Publisher::where('code', 'RVN')->first()->games()->save($labyrinth);
            Publisher::where('code', 'RGG')->first()->games()->save($concordia);

            $cardCat->games()->attach($splendor->id);
            $advnCat->games()->attach($labyrinth->id);
            $wargCat->games()->attach([$sorry->id, $concordia->id]);
            $civiCat->games()->attach($concordia->id);
    }
}
