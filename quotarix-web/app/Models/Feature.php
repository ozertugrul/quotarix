<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'icon',
        'title',
        'summary',
        'body',
        'image',
        'meta_title',
        'meta_description',
        'badge',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order', 'asc');
    }

    public function scopeMainFeatures($query)
    {
        return $query->active()->whereNull('badge');
    }

    public function scopeRoadmap($query)
    {
        return $query->active()->whereNotNull('badge');
    }
}
