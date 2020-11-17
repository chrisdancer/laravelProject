<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Carpool extends Model
{
    use HasFactory;

    protected $fillable = [
        'driverName', 'departureLocation', 'destination', 'show', 'departureTime', 'departureDate', 'seatsAvailable'
    ];

    protected static function booted()
    {
        static::creating(function ($article) {
            $article->user_id = Auth::id();
        });
    }

    public function user() {
        Return $this->belongsTo(User::class, 'user_id');
    }
}
