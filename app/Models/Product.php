<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Scope Filter By Category
     */
    public function scopeFilter($query, array $filters)
    {
        if ($filters['category'] ?? false) {
            return $query->where('category_id', $filters['category']);
        }
        if ($filters['minimum'] ?? false) {
            return $query->whereBetween('price', [$filters['minimum'], $filters['maximum']]);
        }
        if ($filters['query'] ?? false) {
            if ($filters['category_id'] !== 'all') {
                return $query->where('title', 'like', '%' . request('query') . '%')->orWhere('description', 'like', '%' . request('query') . '%')->where('category_id', $filters['category_id']);
            }
            return $query->where('title', 'like', '%' . request('query') . '%')->orWhere('description', 'like', '%' . request('query') . '%');
        }
    }

    /**
     * Belongs To relationship
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}