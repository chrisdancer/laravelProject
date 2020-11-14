<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image'
    ];

    public function comment() {
        Return $this->hasMany(Comment::class);
    }

    protected static function booted()
    {
        static::creating(function ($image) {
            $image->user_id = Auth::id();
        });
    }
}
