<?php

namespace App\Http\Resources\API\CommentResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentBlockResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => 200,
            'data' => $this->collection->map(function ($item) {
                return [
                    'uuid' => $item->id,
                    'nama' => $item->name,
                    'hadir' => $item->present,
                    'komentar' => $item->comment,
                    'created_at' => $item->created_at->locale('id')->diffForHumans(),
                    'comments' => $item->children->map(fn ($child) => new CommentSingellResource($child)),
                    'like' => [
                        'love' => $item->likes_count ?? 0,
                    ],
                ];
            }),
            'error' => null,
        ];
    }
}
