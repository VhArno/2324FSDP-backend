<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suggestion extends Model
{
    use HasFactory;

    /* Relations */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function question(): BelongsTo {
        return $this->belongsTo(Question::class);
    }

    public function operation(): BelongsTo {
        return $this->belongsTo(Operation::class);
    }
}
