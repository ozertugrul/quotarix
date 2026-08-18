<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'message',
        'source',
        'ip',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function scopeDemo($query)
    {
        return $query->where('source', 'demo');
    }

    public function scopeContact($query)
    {
        return $query->where('source', 'contact');
    }

    public function getIsReadAttribute(): bool
    {
        return !is_null($this->read_at);
    }
}
