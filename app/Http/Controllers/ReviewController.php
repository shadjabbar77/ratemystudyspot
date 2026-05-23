<?php

namespace App\Http\Controllers;

use App\Models\StudySpot;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    // -------- WEB (Blade) --------

    public function create(StudySpot $studySpot)
    {
        $this->authorize('create', Review::class);
        return view('reviews.create', compact('studySpot'));
    }

    public function store(Request $request, StudySpot $studySpot)
    {
        $data = $request->validate([
            'rating' => ['required', 'integer', 'min:0', 'max:5'],
            'text'   => ['required', 'string', 'max:2000'],
        ]);

           $this->authorize('create', Review::class);

        // Prevent duplicate review by same user for same study spot
        $already = Review::where('study_spot_id', $studySpot->id)
            ->where('user_id', auth()->id())
            ->exists();

        if ($already) {
            return redirect()
                ->route('study-spots.show', $studySpot)
                ->with('error', 'You already reviewed this study spot.');
        }

        Review::create([
            'study_spot_id' => $studySpot->id,
            'user_id'       => auth()->id(),
            'rating'        => $data['rating'],
            'text'          => $data['text'],
        ]);

        return redirect()
            ->route('study-spots.show', $studySpot)
            ->with('success', 'Review posted!');
    }

    public function edit(StudySpot $studySpot, Review $review)
    {
        abort_unless($review->study_spot_id === $studySpot->id, 404);

        // Owner-only
        $this->authorize('update', $review);

        return view('reviews.edit', compact('studySpot', 'review'));
    }

    public function updateWeb(Request $request, StudySpot $studySpot, Review $review)
    {
        abort_unless($review->study_spot_id === $studySpot->id, 404);

        // Owner-only
        $this->authorize('update', $review);

        $data = $request->validate([
            'rating' => ['required', 'integer', 'min:0', 'max:5'],
            'text'   => ['required', 'string', 'max:2000'],
        ]);

        $review->update($data);

        return redirect()
            ->route('study-spots.show', $studySpot)
            ->with('success', 'Review updated!');
    }

    public function destroyWeb(StudySpot $studySpot, Review $review)
    {
        abort_unless($review->study_spot_id === $studySpot->id, 404);

        // Owner-only
        $this->authorize('delete', $review);

        $review->delete();

        return redirect()
            ->route('study-spots.show', $studySpot)
            ->with('success', 'Review deleted!');
    }

    public function myReviews()
    {
        $reviews = Review::with('studySpot')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('reviews.my', compact('reviews'));
    }

    // -------- API (JSON) --------

    public function index(StudySpot $studySpot)
    {
        return $studySpot->reviews()->latest()->paginate(20);
    }

    public function show(StudySpot $studySpot, Review $review)
    {
        abort_unless($review->study_spot_id === $studySpot->id, 404);

        return $review;
    }

    public function storeApi(StoreReviewRequest $request, StudySpot $studySpot)
    {

$this->authorize('create', Review::class);


        return $studySpot->reviews()->create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);
    }

    public function update(UpdateReviewRequest $request, StudySpot $studySpot, Review $review)
    {
        abort_unless($review->study_spot_id === $studySpot->id, 404);

        // Owner-only
        $this->authorize('update', $review);

        $review->update($request->validated());

        return $review->fresh();
    }

    public function destroy(StudySpot $studySpot, Review $review)
    {
        abort_unless($review->study_spot_id === $studySpot->id, 404);

        // Owner-only
        $this->authorize('delete', $review);

        $review->delete();

        return response()->noContent();
    }
}
