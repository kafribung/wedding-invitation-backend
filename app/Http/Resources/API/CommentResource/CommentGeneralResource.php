<?php

namespace App\Http\Resources\API\CommentResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentGeneralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'data' => [
                'uuid' => $this->id,
                'nama' => $this->name,
                'hadir' => $this->present,
                'komentar' => $this->comment,
                'own' => $this->owner,
                'created_at' => $this->created_at->locale('id')->diffForHumans(),
            ],
            'error' => $this->error ?? null,
        ];
    }
}
