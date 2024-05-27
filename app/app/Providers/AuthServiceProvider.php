<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Policies\AnswerPolicy;
use App\Policies\QuestionPolicy;
use App\Policies\AccountPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Question::class => QuestionPolicy::class,
        Answer::class => AnswerPolicy::class,
        User::class => AccountPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
