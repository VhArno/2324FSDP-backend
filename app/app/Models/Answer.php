<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Answer extends Model
{
    use HasFactory;

    public $timestamps = false;

    /* Relations */
    public function specialisation(): BelongsTo {
        return $this->belongsTo(Specialisation::class);
    }

    public function question(): BelongsTo {
        return $this->belongsTo(Question::class);
    }

    public function user(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_answers', 'answer_id', 'user_id');
    }
}
