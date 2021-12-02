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

    public function categoryList(): string
    {
        $catNames = [];

        foreach ($this->gameCategory as $cat) {
            array_push($catNames, $cat->name);
        }

        return implode(', ', $catNames);
    }

    public function isOnWishlist(): bool
    {
        $userGames = auth()->user()?->userGame;
        $onWishlist = false;
        $userGame = $userGames?->where('id', $this->id)->first();

        if ($userGame) {
            $onWishlist = $userGame->pivot->on_wishlist === 1;
        }

        return $onWishlist;
    }

    public function gameUser()
    {
        return $this->belongsToMany(User::class)->using(ReviewAndWishlist::class)->withPivot([
            'game_rating',
            'text_review',
            'on_wishlist'
        ]);;
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'category_id'
    ];
}
