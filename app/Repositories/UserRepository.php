<?php

namespace App\Repositories; 
use App\Models\Game;
use App\Models\ReviewAndWishlist;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function selectWishlistByUserId($userId): Collections
    {
        
        return Game::orderBy('title')->get();

        return $wishlist;
    }

    public function upsertGameReview(int $game_id, int $user_id, float $game_rating, string $text_review): ReviewAndWishlist
    {
        $user = User::find($user_id);
        $rating = [
            'game_rating' => $game_rating,
            'text_review' => $text_review,
        ];

        if (self::gameAlreadyThere($game_id, $user_id)) {
            // update
            $user->userGame()->updateExistingPivot($game_id, $rating);
        } else {
            // insert
            $user->userGame()->attach($game_id, $rating);
        }

        return $user->userGame->where('id', $game_id)->first()->pivot;
    }

    private static function gameAlreadyThere(int $gameId, int $userId): bool
    {
        return ReviewAndWishlist::where('game_id', $gameId)
            ->where('user_id', $userId)->exists();
    }
}
