<?php

namespace App\Repositories; 

class UserRepository
{
    public function selectWishlistByUserId($userId): Collections
    {
        
        return Game::orderBy('title')->get();

        return $wishlist;
    }
}