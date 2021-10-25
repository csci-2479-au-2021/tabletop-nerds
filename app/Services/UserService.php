<?php

namespace App\Services;

use App\Repositories\UserRepository; 

class UserService 
{
    public function __construct(UserReopsitory $userRepository)
        {
            $this->userRepository = $userRepository;
        }

    public function getWishlistByUserId(): array
    {
        return $this->userRepository->getWishlistByUserId();
    }
}