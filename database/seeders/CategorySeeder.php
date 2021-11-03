<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryFactory = Category::factory();
        $categoryFactory->create(['name' => 'Card Game', 'code' => 'CARD']);
        $categoryFactory->create(['name' => 'Economic', 'code' => 'ECON']);
        $categoryFactory->create(['name' => 'Negotiation', 'code' => 'NEGO']);
        $categoryFactory->create(['name' => 'Dice', 'code' => 'DICE']);
        $categoryFactory->create(['name' => 'Adventure', 'code' => 'ADVN']);
        $categoryFactory->create(['name' => 'Fantasy', 'code' => 'FANT']);
        $categoryFactory->create(['name' => 'Fighting', 'code' => 'FIGH']);
        $categoryFactory->create(['name' => 'Puzzle', 'code' => 'PUZZ']);
        $categoryFactory->create(['name' => 'Miniatures', 'code' => 'MINI']);
        $categoryFactory->create(['name' => 'Territory Building', 'code' => 'TERR']);
        $categoryFactory->create(['name' => 'War Game', 'code' => 'WARG']);
        $categoryFactory->create(['name' => 'Science Fiction', 'code' => 'SCIF']);
        $categoryFactory->create(['name' => 'Civilization', 'code' => 'CIVI']);

    }
}