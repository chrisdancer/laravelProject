<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    public function artist() {
        Return $this->belongsTo(Artist::class);
    }

    public function location() {
        Return $this->belongsTo(Location::class);
    }
}
