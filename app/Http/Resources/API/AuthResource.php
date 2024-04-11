<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'data' => [
                'token' => $this->token,
                'user' => [
                    'name' => $this->name,
                    'email' => $this->email,
                ],
            ],
            'error' => null,
        ];
    }
}
