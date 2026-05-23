<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    public function index(Review $review)
    {
        return $review->comments()->latest()->paginate(50);
    }

    public function store(StoreCommentRequest $request, Review $review)
    {
        return $review->comments()->create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);
    }

    public function update(UpdateCommentRequest $request, Review $review, Comment $comment)
    {
        abort_unless($comment->review_id === $review->id, 404);
        $this->authorize('update', $comment);
        $comment->update($request->validated());
        return $comment->fresh();
    }

    public function destroy(Review $review, Comment $comment)
    {
        abort_unless($comment->review_id === $review->id, 404);
        $this->authorize('delete', $comment);
        $comment->delete();
        return response()->noContent();
    }
}
