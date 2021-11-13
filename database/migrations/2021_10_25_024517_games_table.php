<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->nullable();
            $table->string('title');
            $table->string('image');
            $table->text('description');
            $table->timestamps();
            // $table->decimal('complexity_rating', $precision = 3, $scale = 2);
            $table->year('release_year');
            // $table->foreignId('publisher_id')->constrained()->nullable();
            // $table->integer('playing_time_minutes');
            // $table->integer('min_number_players');
            // $table->integer('max_number_players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
