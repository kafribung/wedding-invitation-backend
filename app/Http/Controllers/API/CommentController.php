<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\API\CommentResource;
use App\Models;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Models\Comment::with(['children', 'likes'])->where('parent_id', null)->withCount('likes')->latest()->paginate(10);

        return new CommentResource\CommentBlockResource($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();
        $validated['owner'] = Str::uuid()->toString();

        $data = Models\Comment::create($validated);
        $data['code'] = 201;

        return new CommentResource\CommentGeneralResource($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Models\Comment $comment)
    {
        $comment['code'] = 200;

        return new CommentResource\CommentGeneralResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $owner)
    {
        $comment = Models\Comment::where('owner', $owner)->first();

        $validated = $request->validated();

        $comment->update($validated);
        $comment['code'] = 201;

        return new CommentResource\CommentGeneralResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $owner)
    {
        $comment = Models\Comment::where('owner', $owner)->first();

        $comment->delete();

        $comment['code'] = 201;

        return new CommentResource\CommentGeneralResource($comment);
    }
}
