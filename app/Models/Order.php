<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    /**
     * Scope Filter
     */
    public function scopeFilter($query, array $filters)
    {
        if ($filters['status'] ?? false) {
            return $query->where('status', $filters['status']);
        }
    }
}