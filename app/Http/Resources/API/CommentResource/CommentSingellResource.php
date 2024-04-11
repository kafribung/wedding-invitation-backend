<?php

namespace App\Http\Resources\API\CommentResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentSingellResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->id,
            'nama' => $this->name,
            'hadir' => $this->present,
            'komentar' => $this->comment,
            'created_at' => $this->created_at->locale('id')->diffForHumans(),
            'comments' => $this->children->map(fn ($child) => new CommentSingellResource($child)),
            'like' => [
                'love' => $this->loadCount('likes')->likes_count ?? 0,
            ],
        ];
    }
}
