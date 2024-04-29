<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    /* Relations */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function specialisation(): BelongsTo {
        return $this->belongsTo(Specialisation::class);
    }
}
