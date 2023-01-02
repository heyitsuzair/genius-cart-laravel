<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'wishlist';

    /**
     * Belongs To relationship
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}