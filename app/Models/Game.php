<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function gameType()
    {
        return $this->belongsTo(GameType::class);
    }

    public function gameCategory()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'title',
        'description',
        'image'
    ];
}
