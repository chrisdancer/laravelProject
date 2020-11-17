<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'theme_id'
    ];

    public static function getThemeID()
    {
        $article = new Article();
        return $article->theme_id;
    }

    protected static function booted()
    {
        static::creating(function ($article) {
            $article->user_id = Auth::id();
        });
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function theme() {
        return $this->belongsTo(Theme::class, 'theme_id');
    }
}
