<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
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

