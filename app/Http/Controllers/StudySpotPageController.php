<?php

namespace App\Http\Controllers;

use App\Models\StudySpot;

use Illuminate\Http\Request;

class StudySpotPageController extends Controller
{
    public function index(Request $request)
{
    $q = $request->input('q');

    $spots = StudySpot::query()
        ->withCount('reviews')
        ->withAvg('reviews', 'rating')
        ->when($q, function ($query) use ($q) {
            $m = metaphone($q);

            $query->where(function ($sub) use ($q, $m) {
                $sub->where('building', 'like', "%{$q}%")
                    ->orWhere('metaphone', $m);
            });
        })
        ->orderBy('building')
        ->get();

    return view('study-spots.index', compact('spots', 'q'));
}
   public function show(\App\Models\StudySpot $studySpot)
{
    $studySpot = \App\Models\StudySpot::with(['reviews.user'])
        ->withCount('reviews')
        ->withAvg('reviews', 'rating')
        ->findOrFail($studySpot->id);

    $reviews = $studySpot->reviews()
        ->with('user')
        ->latest()
        ->get();

    return view('study-spots.show', [
        'studySpot' => $studySpot,
        'spot' => $studySpot,
        'reviews' => $reviews,
    ]);
}
}


