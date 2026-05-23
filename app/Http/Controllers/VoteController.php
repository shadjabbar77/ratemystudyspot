<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Vote;

class VoteController extends Controller
{
    public function store(Request $request, Review $review)
    {
        $data = $request->validate([
            'type' => ['required','in:up,down'],
        ]);

        Vote::updateOrCreate(
            ['review_id' => $review->id, 'user_id' => $request->user()->id],
            ['type' => $data['type']]
        );

        return response()->noContent();
    }

    public function destroy(Request $request, Review $review)
    {
        Vote::where('review_id', $review->id)
            ->where('user_id', $request->user()->id)
            ->delete();

        return response()->noContent();
    }
}
