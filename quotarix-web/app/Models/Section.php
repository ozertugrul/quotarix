<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order', 'asc');
    }

    protected static function booted(): void
    {
        static::saved(function () {
            Cache::forget('site_active_sections');
        });

        static::deleted(function () {
            Cache::forget('site_active_sections');
        });
    }
}
