<?php

namespace App\Repositories; 
use App\Models\Reviews;

use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function selectWishlistByUserId($userId): Collections
    {
        
        return Game::orderBy('title')->get();

        return $wishlist;
    }

    public function InsertGameReview(int $game_id, int $user_id, int $game_rating, string $text_review):Reviews{

        DB::insert('insert into game_user (game_id, user_id, game_rating, text_review) values (?,?,?,?)', [$game_id, $user_id,$game_rating,$text_review]);
        $dbValue = DB::table('game_user')->where('game_id', $game_id)->first();
        $userReview = new Reviews();
        $userReview->game_id = $dbValue->game_id;
        $userReview->user_id = $dbValue->user_id;
        $userReview->game_rating = $dbValue->game_rating;
        $userReview->text_review = $dbValue->text_review;
        return $userReview;
    }
}
