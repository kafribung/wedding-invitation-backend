<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\LikeResource;
use App\Models;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Models\Comment $comment, Request $request)
    {
        $comment->loadCount('likes')->likes()->create([
            'owner' => $owner = str()->uuid()->toString(),
        ]);
        $comment['owner_like'] = $owner;

        return new LikeResource\LikeGeneralResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $owner)
    {
        $like = Models\Like::where('owner', $owner)->first();
        $like->delete();

        return new LikeResource\LikeGeneralResource($like->likeable);
    }
}
