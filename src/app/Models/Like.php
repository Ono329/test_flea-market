<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function likes()
{
    return $this->hasMany(Like::class);
}
    protected $fillable = [
        'user_id',
        'product_id'
    ];

}
