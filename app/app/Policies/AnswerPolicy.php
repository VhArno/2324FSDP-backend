<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AnswerPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role->role_name == 'admin' || $user->role->role_name == 'superadmin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Answer $answer): bool
    {
        return $user->role->role_name == 'admin' || $user->role->role_name == 'superadmin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Answer $answer): bool
    {
        return $user->role->role_name == 'admin' || $user->role->role_name == 'superadmin';
    }
}
