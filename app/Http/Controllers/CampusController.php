<?php

namespace App\Http\Controllers;

use App\Models\Campus;

class CampusController extends Controller
{
    public function show(Campus $campus)
    {
        $q = request('q');

        $spots = $campus->studySpots()
    ->withCount('reviews')
    ->withAvg('reviews', 'rating')
            ->when($q, function ($query) use ($q) {
                $query->where('building', 'like', "%{$q}%")
                      ->orWhere('room_area_name', 'like', "%{$q}%");
            })
            ->orderBy('building')
            ->orderBy('floor')
            ->orderBy('room_area_name')
            ->paginate(20)
            ->withQueryString();

        return view('campuses.show', [
            'campus' => $campus,
            'spots' => $spots,
            'q' => $q,
        ]);
    }
}