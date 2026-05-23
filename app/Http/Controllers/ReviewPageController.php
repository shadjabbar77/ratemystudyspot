<?php

namespace App\Http\Controllers;

use App\Models\StudySpot;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewPageController extends Controller
{
    public function create(\App\Models\StudySpot $studySpot)
{
    return view('reviews.create', ['studySpot' => $studySpot]);
}



public function store(Request $request, \App\Models\StudySpot $studySpot)
{
    $data = $request->validate([
        'rating' => ['required','integer','min:1','max:5'],
        'text'   => ['nullable','string'],
    ]);

    $userId = auth()->id();

    $existing = Review::where('study_spot_id', $studySpot->id)
        ->where('user_id', $userId)
        ->first();

    if ($existing) {
        return redirect()
            ->route('study-spots.show', $studySpot)
            ->with('error', 'You already reviewed this spot. Edit your review.');
    }

    Review::create([
        'study_spot_id' => $studySpot->id,
        'user_id'       => $userId,
        'rating'        => $data['rating'],
        'text'          => $data['text'] ?? null,
    ]);

    return redirect()
        ->route('study-spots.show', $studySpot)
        ->with('success', 'Review posted.');
}

public function edit(\App\Models\StudySpot $studySpot, \App\Models\Review $review)
{
    // safety: ensure the review matches the spot and belongs to the user
    abort_unless($review->study_spot_id === $studySpot->id, 404);

    if ($review->user_id !== auth()->id()) {
        return redirect()
            ->route('study-spots.show', $studySpot)
            ->with('error', 'You can only edit your own review.');
    }

    return view('reviews.edit', ['studySpot' => $studySpot, 'review' => $review]);
}

public function destroy(\App\Models\StudySpot $studySpot, \App\Models\Review $review)
{
    abort_unless($review->study_spot_id === $studySpot->id, 404);

    if ($review->user_id !== auth()->id()) {
        return redirect()
            ->route('study-spots.show', $studySpot)
            ->with('error', 'You can only delete your own review.');
    }

    $review->delete();

    return redirect()
        ->route('study-spots.show', $studySpot)
        ->with('success', 'Review deleted.');
}

public function update(\Illuminate\Http\Request $request, \App\Models\StudySpot $studySpot, \App\Models\Review $review)
{
    abort_unless($review->study_spot_id === $studySpot->id, 404);

    if ($review->user_id !== auth()->id()) {
        return redirect()
            ->route('study-spots.show', $studySpot)
            ->with('error', 'You can only edit your own review.');
    }

    $data = $request->validate([
        'rating' => ['required','integer','min:1','max:5'],
        'text'   => ['nullable','string'],
    ]);

    $review->update([
        'rating' => $data['rating'],
        'text'   => $data['text'] ?? null,
    ]);

    return redirect()
        ->route('study-spots.show', $studySpot)
        ->with('success', 'Review updated.');
}


public function myReviews()
{
    $reviews = \App\Models\Review::with('studySpot')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('profile.my-reviews', compact('reviews'));
}

}