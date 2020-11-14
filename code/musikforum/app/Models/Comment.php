<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment', 'image_id'
    ];

    public function image() {
        Return $this->belongsTo(Image::class);
    }

    protected static function booted()
    {
        static::creating(function ($comment) {
            $comment->user_id = Auth::id();
        });
    }
}
