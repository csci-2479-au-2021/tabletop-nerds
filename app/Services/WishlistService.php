<?php

namespace App\Services;

use App\Repositories\WishlistRepository; 
use App\Models\Game;

class WishlistService
{
    public function __construct( WishlistRepository $wishlistRepository)
        {
            
            $this->wishlistRepository = $wishlistRepository;
        }
    


    public function getWishlistByUserId($userId){
        return($this->wishlistRepository->selectWishlistByUserId($userId));

    }

    public function removeWishlistGame(int $game_id, int $user_id, bool $on_wishlist)
    {   
        return ($this->wishlistRepository->updateRemoveFromWishlist($game_id,$user_id,$on_wishlist));
    }

    public function addToWishlist(int $game_id, int $user_id, bool $on_wishlist)
    {
        return ($this->wishlistRepository->addUpdateToWishlist($game_id,$user_id,$on_wishlist));
    }

    
}