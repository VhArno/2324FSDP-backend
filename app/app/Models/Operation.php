<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    public $timestamps = false;

    // Relations
    public function suggestions(): HasMany {
        return $this->hasMany(Suggestion::class);
    }
}
