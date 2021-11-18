<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GameUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_user', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->decimal('game_rating', 3, 1)->nullable();
            $table->text('text_review')->nullable();
            $table->boolean('on_wishlist')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('game_user');
    }
}
