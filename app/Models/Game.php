<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function gameCategory()
    {
        return $this->belongsToMany(Category::class);
    }

    public function gameUser()
    {
        return $this->belongsToMany(User::class)->using(ReviewAndWishlist::class)->withPivot([
            'game_rating',
            'text_review',
            'on_wishlist'
        ]);;
    }

    public function gamePublisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function getAvgRatingAttribute()
    {
        $ratings = [];
        $avg = 0;

        foreach ($this->gameUser as $gu) {
            array_push($ratings, $gu->pivot->game_rating);
        }

        if (count($ratings) > 0) {
            $avg = array_sum($ratings) / count($ratings);
        }

        return number_format($avg, 1);
    }

    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'category_id'
    ];
}
