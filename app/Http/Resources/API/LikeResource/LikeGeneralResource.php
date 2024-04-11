<?php

namespace App\Http\Resources\API\LikeResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LikeGeneralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => 201,
            'data' => [
                'uuid' => $this->id,
                'nama' => $this->name,
                'hadir' => $this->present,
                'komentar' => $this->comment,
                'own' => $this->owner,
                'created_at' => $this->created_at->locale('id')->diffForHumans(),
                'like' => [
                    'love' => $this->likes_count ?? 0,
                ],
            ],
            'error' => $this->error ?? null,
        ];
    }
}
