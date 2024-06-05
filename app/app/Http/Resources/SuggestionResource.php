<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\UserResource;

class SuggestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'operation' => $this->operation,
            'new_value' => $this->new_value,
            'question' => new QuestionResource($this->question_id),
            'user' => new UserResource($this->user_id),
            'created_at' => $this->created_at,
        ];
    }
}
