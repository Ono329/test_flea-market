<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function likes()
    {
    return $this->hasMany(Like::class);
    }

    protected $fillable = [
    'user_id',
    'name',
    'brand',
    'price',
    'description',
    'category',
    'condition',
    'img_url'
];
}


