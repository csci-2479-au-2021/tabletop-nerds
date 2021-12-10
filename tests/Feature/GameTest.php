<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\Publisher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $pub1 = Publisher::factory()->create([
            'name' => 'Fantasy Flight Games',
            'code' => 'FFG',
        ]);

        $pub2 = Publisher::factory()->create([
            'name' => 'Z-Man Games',
            'code' => 'ZMG',
        ]);

        $pub3 = Publisher::factory()->create([
            'name' => 'KOSMOS',
            'code' => 'KOS',
        ]);

        $pub4 = Publisher::factory()->create([
            'name' => 'Days of Wonder',
            'code' => 'DOW',
        ]);

        $pub5 = Publisher::factory()->create([
            'name' => 'Cool Mini or Not',
            'code' => 'CMN',
        ]);

        $pub6 = Publisher::factory()->create([
            'name' => 'Ravensburger',
            'code' => 'RVN',
        ]);

        $pub7 = Publisher::factory()->create([
            'name' => 'Rio Grande Games',
            'code' => 'RGG',
        ]);

        Game::factory(2)->for($pub1)->create();
        Game::factory(3)->for($pub2)->create();
        Game::factory(2)->for($pub3)->create();
        Game::factory(3)->for($pub4)->create();
        Game::factory(2)->for($pub5)->create();
        Game::factory(3)->for($pub6)->create();
        Game::factory(2)->for($pub7)->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_gamelist_returns_successfully()
    {
        $response = $this->get('/games');

        $response->assertStatus(200);
        $games = $response->viewData('games');

        $this->assertCount(17, $games);
    }
}
