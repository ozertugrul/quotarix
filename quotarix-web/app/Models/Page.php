<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'slug',
        'title',
        'meta_title',
        'meta_description',
        'og_image',
        'body',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    protected static function booted(): void
    {
        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('site_page_metas');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('site_page_metas');
        });
    }
}
