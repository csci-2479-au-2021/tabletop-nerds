<?php

namespace App\Services;

use App\Models\ReviewAndWishlist;
use App\Repositories\UserRepository; 

class UserService 
{
    public function __construct(UserRepository $userRepository)
        {
            $this->userRepository = $userRepository;
        }

    public function getWishlistByUserId(): array
    {
        return $this->userRepository->getWishlistByUserId();
    }

    public function submitGameReview(int $game_id, int $user_id, float $game_rating, string $text_review): ReviewAndWishlist
    {
        return $this->userRepository->upsertGameReview($game_id, $user_id, $game_rating, $text_review);
    }

    public function makeMeAAdmin(int $user_id){
        return $this->userRepository->makeMeAAdmin($user_id);
    }
}
