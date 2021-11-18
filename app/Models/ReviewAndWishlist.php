<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ReviewAndWishlist extends Pivot
{
    protected $table = 'game_user';
    // use game_user;

    protected $fillable = [
        'game_id',
        'title',
        'user_id',
        'game_rating',
        'text_review',
        'on_wishlist',
    ];

}
