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

        $pub = Publisher::factory()->create([
            'name' => 'Cool Mini or Not',
            'code' => 'CMON',
        ]);
        Game::factory(6)->for($pub)->create();
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

        $this->assertCount(6, $games);
    }
}
