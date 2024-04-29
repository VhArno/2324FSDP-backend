<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialisation extends Model
{
    use HasFactory;

    /* Relations */
    public function results(): HasMany {
        return $this->hasMany(Result::class);
    }

    public function answers(): HasMany {
        return $this->hasMany(Answer::class);
    }
}
