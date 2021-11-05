<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;


class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisherFactory = Publisher::factory();
        $publisherFactory->create(['name' => 'Fantasy Flight Games', 'code' => 'FFG']);
        $publisherFactory->create(['name' => 'Z-Man Games', 'code' => 'ZMG']);
        $publisherFactory->create(['name' => 'KOSMOS', 'code' => 'KOS']);
        $publisherFactory->create(['name' => 'Days of Wonder', 'code' => 'DOW']);
        $publisherFactory->create(['name' => 'Cool Mini Or Not', 'code' => 'CMN']);
        $publisherFactory->create(['name' => 'Ravensburger', 'code' => 'RVN']);
        $publisherFactory->create(['name' => 'Rio Grande Games', 'code' => 'RGG']);
    }
}
