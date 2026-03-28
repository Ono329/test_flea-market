<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'postal_code',
        'address',
        'building',
        'payment_method',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
