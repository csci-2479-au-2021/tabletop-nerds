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

    public function gamePublisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id'
    ];
}
