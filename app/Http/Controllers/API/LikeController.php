<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\LikeResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Comment $comment, Request $request)
    {
        if ($request->isMethod('PATCH')) {
            $comment->loadCount('likes')->likes()->delete();

            return new LikeResource\LikeGeneralResource($comment);
        } elseif ($request->isMethod('POST')) {
            $comment->loadCount('likes')->likes()->create();

            return new LikeResource\LikeGeneralResource($comment);
        }
    }
}
