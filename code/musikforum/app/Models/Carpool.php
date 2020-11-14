<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpool extends Model
{
    use HasFactory;

    public function user() {
        Return $this->hasMany(User::class);
    }
}
