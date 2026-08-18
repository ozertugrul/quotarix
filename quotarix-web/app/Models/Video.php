<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'video_url',
        'thumbnail',
        'placement',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $appends = [
        'embed_id',
        'thumb',
        'embed_url',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order', 'asc');
    }

    public function getEmbedIdAttribute(): ?string
    {
        if (empty($this->video_url)) {
            return null;
        }

        // YouTube regex (watch?v=, youtu.be/, embed/)
        if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/i', $this->video_url, $matches)) {
            return $matches[1];
        }

        // Vimeo regex
        if (preg_match('/vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|album\/(?:\d+)\/video\/|video\/|)(\d+)/i', $this->video_url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    public function getIsYoutubeAttribute(): bool
    {
        return !empty($this->video_url) && (str_contains($this->video_url, 'youtube.com') || str_contains($this->video_url, 'youtu.be'));
    }

    public function getIsVimeoAttribute(): bool
    {
        return !empty($this->video_url) && str_contains($this->video_url, 'vimeo.com');
    }

    public function getThumbAttribute(): ?string
    {
        if (!empty($this->thumbnail)) {
            return $this->thumbnail;
        }

        $id = $this->embed_id;
        if ($id && $this->is_youtube) {
            return "https://i.ytimg.com/vi/{$id}/hqdefault.jpg";
        }

        return null;
    }

    public function getEmbedUrlAttribute(): ?string
    {
        $id = $this->embed_id;
        if (!$id) {
            return null;
        }

        if ($this->is_youtube) {
            return "https://www.youtube-nocookie.com/embed/{$id}?autoplay=1";
        }

        if ($this->is_vimeo) {
            return "https://player.vimeo.com/video/{$id}?autoplay=1";
        }

        return null;
    }
}
